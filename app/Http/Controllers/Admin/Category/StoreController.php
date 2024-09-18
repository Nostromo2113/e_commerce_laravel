<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        // Проверяем, существует ли категория с таким названием
        $category = Category::where('title', $data['title'])->first();

        if ($category) {
            // Возвращаем статус 409, если категория уже существует
            return response()->json([
                'message' => 'Category already exists'
            ], 409);
        }

        // Если категория не существует, создаем её
        $newCategory = Category::create($data);

        // Возвращаем успешный ответ с данными и статусом 201
        return response()->json([
            'message' => 'Category created successfully',
            'data' => $newCategory
        ], 201);
    }
}
