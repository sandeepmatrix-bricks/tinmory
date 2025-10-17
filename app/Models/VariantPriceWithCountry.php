<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class VariantPriceWithCountry extends Model
{
    
    use HasFactory, SoftDeletes;

    protected $table = 'variant_price_with_countries';

    protected $fillable = [
        'product_id',
        'country_id',
        'variant_id',
        'price',
        'status',
    ];

}
