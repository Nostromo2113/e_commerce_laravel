<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class DestroyController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $tag->delete();
        return 'Элемент удален';
    }
}
