<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Products;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Auth;
use App\Models\VariantType;
use DB;

class InventoryController extends Controller
{
    
    public function index(Request $request, $productId)
    {
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


   public function create($productId)
    {
        $user = Auth::user();

        // Get product details
        $productDetails = Products::select('id', 'product_name')
            ->where('id', $productId)
            ->firstOrFail();

        // Get all variants for this product
        $variants = VariantType::where('product_id', $productId)->get();

        // Get warehouses based on user role
        if ($user->role === 'super_admin') {
            $warehouses = Warehouse::all();
            $userWarehouse = null; // not needed for super_admin
        } elseif ($user->role === 'warehouse') {
            $userWarehouse = Warehouse::where('manager_id', $user->id)->first();
            $warehouses = null; // warehouse user cannot select other warehouses
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
}
