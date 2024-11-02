<?php

namespace App\Http\Controllers\Admin\TechnicalRequirement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TechnicalRequirement\StoreRequest;
use App\Models\TechnicalRequirement;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        // Проверяем, существует ли категория с таким названием
        $technicalRequirement = TechnicalRequirement::where('title', $data['title'])->first();

        if ($technicalRequirement) {
            // Возвращаем статус 409, если категория уже существует
            return response()->json([
                'message' => 'TechnicalRequirement already exists'
            ], 409);
        }

        // Если категория не существует, создаем её
        $newTechnicalRequirement = TechnicalRequirement::create($data);

        // Возвращаем успешный ответ с данными и статусом 201
        return response()->json([
            'message' => 'TechnicalRequirement created successfully',
            'data' => $newTechnicalRequirement
        ], 201);
    }
}
