<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\UpdateRequest;
use App\Models\Genre;
use App\Models\Order;

class UpdateController extends Controller
{
    public function __invoke($orderId, UpdateRequest $request)
    {

        $data = $request->validated();
        $orderProducts = $data['order_products'];


        $order = Order::find($orderId); // Получаем заказ


        $order->products()->sync($orderProducts);

        foreach($order->products as $product) {
            $price = (float)$product['price'];
            $quantity = (int)$product->pivot->quantity;
            $quantityPrice = $price * $quantity;
            $order->products()->updateExistingPivot($product->id, ['price' => $quantityPrice]);
        }


        $totalPrice = collect($order->products)->reduce(function ($carry, $product) {
            $price = (float)$product['price'];
            $quantity = (int)$product->pivot->quantity;

            return $carry + ($price * $quantity);
        }, 0);


        $order->update(['total_price' => $totalPrice]);
        return $order;
    }
}
