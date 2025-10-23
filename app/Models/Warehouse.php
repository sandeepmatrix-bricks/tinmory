<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{

    protected $table = 'warehouse';

    protected $fillable = ['warehouse_name', 'location', 'city', 'state', 'country', 'postal_code', 'capacity', 'manager_id', 'is_active', 'currency'
    ];

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
