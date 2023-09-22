<?php

// app/Models/Slider.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'image_path',
        'width',
        'height',
        'dimensions',
        'published',
    ];

    // Define any relationships or additional methods as needed
}
