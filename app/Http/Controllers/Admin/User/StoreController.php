<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $user = User::where('email', $data['email'])->first();

        if ($user) {
            return response()->json([
                'message' => 'User already exists'
            ], 409);
        }


        $newUser = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'surname' => $data['surname'],
            'patronymic' => $data['patronymic'],
            'gender' => $data['gender'],
            'age' => $data['age'],
            'address' => $data['address']
        ]);
        $newUser->sendEmailVerificationNotification();
        // Возвращаем успешный ответ с данными и статусом 201
        return response()->json([
            'message' => 'User created successfully',
            'data' => $newUser
        ], 201);
    }
}
