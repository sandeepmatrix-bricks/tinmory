<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carousel extends Model
{
    
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'image',
        'title',
        'description',
    ];
}
