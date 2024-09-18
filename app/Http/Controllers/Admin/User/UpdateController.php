<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request)
    {
        // Получаем валидированные данные
        $data = $request->validated();
        // Найти категорию по ID
        $user = User::findOrFail($data['id']);

        // Обновить категорию с новыми данными
        $user->fill([
            'name' => $data['name'],
            'email' => $data['email'],
            'surname' => $data['surname'],
            'patronymic' => $data['patronymic'],
            'gender' => $data['gender'],
            'age' => $data['age'],
            'address' => $data['address']
        ])->save();

        return response()->json([
            'message' => 'Пользователь обновлена успешно',
            'data' => $user
        ], 200);
    }
}
