<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $update = $request->validated();
        $product->update($update);
        $data['title'] = 'Продукт' . " " . $product->title;
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
