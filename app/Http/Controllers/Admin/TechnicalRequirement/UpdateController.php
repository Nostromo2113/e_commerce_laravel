<?php

namespace App\Http\Controllers\Admin\TechnicalRequirement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TechnicalRequirement\UpdateRequest;
use App\Models\TechnicalRequirement;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request)
    {
        // Получаем валидированные данные
        $data = $request->validated();
        // Найти категорию по ID
         $technicalRequirement = TechnicalRequirement::findOrFail($data['id']);

        // Обновить категорию с новыми данными
         $technicalRequirement->update([
            'title' => $data['title']
        ]);

        return response()->json([
            'message' => 'Категория обновлена успешно',
            'data' =>  $technicalRequirement
        ], 200);
    }
}
