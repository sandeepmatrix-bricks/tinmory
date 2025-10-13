<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HighlightItem extends Model
{
    
    use SoftDeletes;

    protected $table = 'highlight_items';
    protected $fillable = ['icon', 'title', 'description'];
}
