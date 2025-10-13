<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class HomeDescriptions extends Model
{
    
    protected $fillable = [
        'title',
        'description',
        'year',
        'year_description',
        'description_video',
        'video_description_text',
    ];
}
