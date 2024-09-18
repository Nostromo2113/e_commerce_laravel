<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Color\UpdateRequest;
use App\Models\Color;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request)
    {
        $data = $request->validated();

        $color = Color::findOrFail($data['id']);


        $color->fill([
            'title' => $data['title'],
            'hex' => $data['hex']
        ])->save();

        return response()->json([
            'message' => 'Color обновлена успешно',
            'data' => $color
        ], 200);
    }
}
