<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request)
    {
        // Получаем валидированные данные
        $data = $request->validated();
        // Найти категорию по ID
        $category = Tag::findOrFail($data['id']);

        // Обновить категорию с новыми данными
        $category->update([
            'title' => $data['title']
        ]);

        return response()->json([
            'message' => 'Категория обновлена успешно',
            'data' => $category
        ], 200);
    }
}
