<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DataService
{
    // public function __construct(private ImageService $imageServicem, private SimpleService $simple, private ImageService $imageService)
    // {
    // }

    public function sluggable($str)
    {
        return Str::slug($str);
    }

   
}
