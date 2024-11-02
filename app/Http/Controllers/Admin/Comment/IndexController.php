<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Comment\IndexRequest;
use App\Http\Resources\Admin\UserResource;
use App\Models\Comment;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke(IndexRequest $request)
    {
        $userId = $request->validated()['query'];
        $user = User::find($userId);
        $comments = $user->comments;
        return $comments;


//        return $user;
//        $comments = $user->comments;
//       return $comments;

    }
}
