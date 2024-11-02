<?php

namespace App\Http\Controllers\Admin\TechnicalRequirement;

use App\Http\Controllers\Controller;
use App\Models\TechnicalRequirement;

class DestroyController extends Controller
{
    public function __invoke(TechnicalRequirement $technicalRequirement)
    {
        $technicalRequirement->delete();
        return 'Элемент удален';
    }
}
