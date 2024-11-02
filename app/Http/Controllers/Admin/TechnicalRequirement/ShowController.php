<?php

namespace App\Http\Controllers\Admin\TechnicalRequirement;
use App\Http\Controllers\Controller;
use App\Models\TechnicalRequirement;
class ShowController extends Controller
{
    public function __invoke(TechnicalRequirement  $technicalRequirement)
    {
        dd( $technicalRequirement);
    }
}
