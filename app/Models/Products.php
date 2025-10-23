<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{

    protected $table = 'all_products';

    protected $fillable = ['product_name', 'category_id', 'slug_url', 'product_description', 'status', 'created_by', 'updated_by'];


    public function inventories() {
        return $this->hasMany(Inventory::class, 'product_id');
    }
}
