<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\StoreRequest;
use App\Models\Order;


class StoreController extends Controller
{

    public function __invoke(StoreRequest $request)
    {
        $userId = $request->validated()['user_id'];

        $order = Order::create([
            'user_id' => $userId,
            'total_price' => 0,
            'status' => 'В работе'

        ]);
        return $order;
    }
}
