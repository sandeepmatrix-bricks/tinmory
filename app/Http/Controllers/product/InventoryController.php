<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Products;
use App\Models\Warehouse;
use App\Models\ProductWareHouse;
use Illuminate\Support\Facades\Auth;
use App\Models\VariantType;
use DB;

class InventoryController extends Controller
{
    
    public function index(Request $request, $productId) {
        $user = Auth::user();

        $productDetails = Products::select('id', 'product_name')
            ->where('id', $productId)
            ->firstOrFail();

        $countries = collect();
        $warehouses = collect();
        $selectedWarehouseIds = [];
        $inventories = collect();
        
        if ($user->role === 'super_admin') {
            $countries = DB::table('countries')->select('id', 'name')->get();

            $warehouses = Warehouse::when($request->country_id, function ($q) use ($request) {
                $q->where('country', $request->country_id);
            })->get();

            $selectedWarehouseIds = $request->warehouse_ids ?? $warehouses->pluck('id')->toArray();

            $inventories = Inventory::with(['warehouse', 'product', 'variant'])
                ->where('product_id', $productId)
                ->when($selectedWarehouseIds, function ($q) use ($selectedWarehouseIds) {
                    $q->whereIn('warehouse_id', $selectedWarehouseIds);
                })
                ->get();
        } elseif ($user->role === 'warehouse') {
            $warehouse = Warehouse::where('manager_id', $user->id)->first();

            if (!$warehouse) {
                abort(403, 'No warehouse assigned to this user');
            }

            $warehouses = collect([$warehouse]);
            $selectedWarehouseIds = [$warehouse->id];

            $inventories = Inventory::with(['warehouse', 'product', 'variant'])
                ->where('product_id', $productId)
                ->where('warehouse_id', $warehouse->id)
                ->get();
        } else {
            abort(403, 'Unauthorized access');
        }

        return view('admin.products.inventory.index', compact(
            'inventories',
            'warehouses',
            'productDetails',
            'productId',
            'countries',
            'selectedWarehouseIds',
            'user'
        ));
    }


    public function create($productId) {
        $user = Auth::user();

        $productDetails = Products::select('id', 'product_name')
            ->where('id', $productId)
            ->firstOrFail();

        $variants = VariantType::where('product_id', $productId)->get();

       
        if ($user->role === 'super_admin') {
            
            $warehouses = ProductWareHouse::join('warehouses', 'warehouse.id', '=', 'product_warehouse.warehouse_id')
                ->where('product_warehouse.status', 1)
                ->select('warehouse.*', 'warehouse.manager_id as warehouse_manager')
                ->get();

            $userWarehouse = null;
        } elseif ($user->role === 'warehouse') {
            
            $userWarehouse = Warehouse::join('product_warehouse', 'product_warehouse.warehouse_id', '=', 'warehouse.id')
                ->where('warehouse.manager_id', $user->id)
                ->where('product_warehouse.status', 1)
                ->select('warehouse.*', 'product_warehouse.id as product_warehouse_id')
                ->first();

            $warehouses = null;
        } else {
            abort(403, 'Unauthorized access');
        }


        return view('admin.products.inventory.create', compact(
            'productId',
            'productDetails',
            'variants',
            'warehouses',
            'userWarehouse',
            'user'
        ));
    }

    public function store(Request $request) {
        
        $validated = $request->validate([
            'product_id' => 'required|exists:all_products,id',
            'warehouse_id' => 'required|exists:warehouse,id',
            'variant_id' => 'required|exists:variant_types,id',
            'stock_quantity' => 'required|integer|min:0',
            'reserved_quantity' => 'required|integer|min:0',
        ]);

        try {

            $exists = Inventory::where('product_id', $request->product_id)
                    ->where('variant_id', $request->variant_id)
                    ->where('warehouse_id', $request->warehouse_id)
                    ->exists();

            if ($exists) {
                return redirect()->back()->withErrors(['duplicate' => 'Inventory already exists for this Product Variant in this Warehouse'])->withInput();
            }
        
            $inventory = new Inventory();
            $inventory->product_id = $validated['product_id'];
            $inventory->warehouse_id = $validated['warehouse_id'];
            $inventory->variant_id = $validated['variant_id'] ?? null;
            $inventory->stock_quantity = $validated['stock_quantity'];
            $inventory->reserved_quantity = $validated['reserved_quantity'];
            $inventory->updated_by = Auth::id();
            $inventory->save();

            return redirect()
                ->route('admin.inventory.index', $validated['product_id'])
                ->with('success', 'Inventory added successfully.');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'Failed to save inventory. ' . $e->getMessage())
                ->withInput();
        }
    }

    public function edit($inventoryId) {
        $inventory = Inventory::with(['product', 'variant', 'warehouse'])->findOrFail($inventoryId);

        $productId = $inventory->product_id;
        $productDetails = $inventory->product;
        $productName = $productDetails?->product_name;

        $variants = VariantType::where('product_id', $productId)->get();

        $user = Auth::user();

        if ($user->role === 'super_admin') {
            
            $warehouses = ProductWareHouse::join('warehouse', 'warehouse.id', '=', 'product_warehouse.warehouse_id')
                ->where('product_warehouse.status', 1)
                ->select('warehouse.*', 'warehouse.manager_id as warehouse_manager')
                ->get();

            $userWarehouse = null;
        } else {
           
            $userWarehouse = Warehouse::join('product_warehouse', 'product_warehouse.warehouse_id', '=', 'warehouses.id')
                ->where('warehouse.manager_id', $user->id)
                ->where('product_warehouse.status', 1)
                ->select('warehouse.*', 'product_warehouse.id as product_warehouse_id')
                ->first();

            $warehouses = null;
        } 

        return view('admin.products.inventory.edit', compact(
            'inventory',
            'productId',
            'productDetails',
            'productName',
            'variants',
            'warehouses',
            'userWarehouse'
        ));
    }


   public function update(Request $request) {

        $validated = $request->validate([
            'product_id'        => 'required|exists:all_products,id',
            'warehouse_id'      => 'required|exists:warehouse,id',
            'variant_id'        => 'nullable|exists:variant_types,id',
            'stock_quantity'    => 'required|integer|min:0',
            'reserved_quantity' => 'nullable|integer|min:0',
        ]);

        $inventory = Inventory::findOrFail($request?->inventory_id);
        
        $available = max(0, $request->stock_quantity - $request->reserved_quantity);

        $inventory->update([
            'product_id'        => $request->product_id,
            'warehouse_id'      => $request->warehouse_id,
            'variant_id'        => $request->variant_id,
            'stock_quantity'    => $request->stock_quantity,
            'reserved_quantity' => $request->reserved_quantity ?? 0,
            'available_quantity'=> $available,
        ]);

        return redirect()
            ->route('admin.inventory.index', $request->product_id)
            ->with('success', 'Inventory updated successfully.');
    }

}
