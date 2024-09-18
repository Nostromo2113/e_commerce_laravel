<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;

class DestroyController extends Controller
{
    public function __invoke(Color $color)
    {
        $color->delete();
        return 'Элемент удален';
    }
}
