<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    
    public function listAllProducts() {
        $fetch_all_products = DB::table('all_products')
                            ->get();
        return view('admin.products.all-products',compact('fetch_all_products'));
    }
}
