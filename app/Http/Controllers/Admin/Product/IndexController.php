<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\IndexRequest;
use App\Models\Product;

class IndexController extends Controller
{
    public function __invoke(IndexRequest $request)
    {
        $data = $request->validated();
        if(isset($data['query'])) {
           return $products = Product::where('title', 'like', '%' . $data['query'] . '%')->get();
        } else {
           return $products = Product::all();
        }



    }
}
