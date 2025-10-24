<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VariantType extends Model
{
    
    protected $table = 'variant_types';

    protected $fillable = ['color_code','color_name','sku','product_id'];

    public function inventories() {
        return $this->hasMany(Inventory::class, 'variant_id');
    }

}
