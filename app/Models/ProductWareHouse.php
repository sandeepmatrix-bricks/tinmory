<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductWareHouse extends Model
{
    protected $table = 'product_warehouse';
    protected $fillables = ['product_id','warehouse_id','status'];
}
