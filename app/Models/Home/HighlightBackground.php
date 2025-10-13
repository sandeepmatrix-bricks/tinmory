<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HighlightBackground extends Model
{
    use SoftDeletes;

    protected $table = 'highlight_background';
    protected $fillable = ['background_image'];
}
