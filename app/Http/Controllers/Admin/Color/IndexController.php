<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;

class IndexController extends Controller
{
    public function __invoke()
    {
       $colors = Color::all();
       return $colors;

    }
}
