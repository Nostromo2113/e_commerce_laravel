<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;

class ShowController extends Controller
{
    public function __invoke(Color $color)
    {
        dd($color);
    }
}
