<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Models\Tag;

class StoreController extends Controller
{

    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        // Проверяем, существует ли категория с таким названием
        $tag = Tag::where('title', $data['title'])->first();

        if ($tag) {
            // Возвращаем статус 409, если категория уже существует
            return response()->json([
                'message' => 'Tag already exists'
            ], 409);
        }

        // Если категория не существует, создаем её
        $newtag = Tag::create($data);

        // Возвращаем успешный ответ с данными и статусом 201
        return response()->json([
            'message' => 'Tag created successfully',
            'data' => $newtag
        ], 201);
    }
}
