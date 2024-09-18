<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Mail\UserRegistered;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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

        $password = Str::random(12);

        $newUser = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($password),
            'surname' => $data['surname'],
            'patronymic' => $data['patronymic'],
            'gender' => $data['gender'],
            'age' => $data['age'],
            'address' => $data['address']
        ]);

        Mail::to($newUser->email)->send(new UserRegistered($newUser, $password));
        $newUser->sendEmailVerificationNotification();
        return response()->json([
            'message' => 'User created successfully',
            'data' => $newUser
        ], 201);
    }
}
