<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Color\StoreRequest;
use App\Models\Color;

class StoreController extends Controller
{

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        // Проверяем, существует ли категория с таким названием
        $color = Color::where('title', $data['title'])->first();

        if ($color) {
            // Возвращаем статус 409, если категория уже существует
            return response()->json([
                'message' => 'Color already exists'
            ], 409);
        }

        // Если категория не существует, создаем её
        $newColor = Color::create($data);

        // Возвращаем успешный ответ с данными и статусом 201
        return response()->json([
            'message' => 'Color created successfully',
            'data' => $newColor
        ], 201);
    }
}
