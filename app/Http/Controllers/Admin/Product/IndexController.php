<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data['title'] = 'Продукты';
        $data['breadcrumbs'] = [
            [
                'title' => 'Главная',
                'url' => route('admin.index'),
            ],
            [
                'title' => $data['title'],
                'url' => route('admin.product.index'),
            ],
        ];
        $products = Product::all();
        foreach ($products as $product) {
            $product->edit  = route('admin.product.show', $product->id);
        }
        $data['products'] = $products;

        return view('admin.product.index', $data);
    }
}
