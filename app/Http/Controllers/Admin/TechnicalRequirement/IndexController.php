<?php

namespace App\Http\Controllers\Admin\TechnicalRequirement;

use App\Http\Controllers\Controller;
use App\Models\TechnicalRequirement;

class IndexController extends Controller
{
    public function __invoke()
    {
        $technicalRequirement = TechnicalRequirement::all();
        return $technicalRequirement;

    }
}
