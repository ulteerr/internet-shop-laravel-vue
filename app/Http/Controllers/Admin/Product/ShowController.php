<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Product $product)
    {
        $data['title'] = 'Тег'. " " . $product->title;
        $data['breadcrumbs'] = [
            [
                'title' => 'Главная',
                'url' => route('admin.index'),
            ],
            [
                'title' => 'Продукты',
                'url' => route('admin.product.index'),
            ],
            [
                'title' => $data['title'],
                'url' => route('admin.product.show', $product->id),
            ],
        ];
        $data['product'] = $product;
        return view('admin.product.show', $data);
    }
}
