<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Product $product)
    {
        // dd($product->tags);
        $data['title'] = 'Редактировать' . " " . $product->title;
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
        $data['tags'] = Tag::select('id', 'title')->get()->map(function ($item) use ($product) {
            return [
                'selected' => in_array($item->id, array_column($product->tags->toArray(), 'id')) ? 'selected' : '',
                'text' => $item->title,
                'value' => $item->id,
            ];
        });;
        $data['colors'] = Color::select('id', 'title')->get()->map(function ($item) use ($product) {
            return [
                'selected' => in_array($item->id, array_column($product->colors->toArray(), 'id')) ? 'selected' : '',
                'text' => $item->title,
                'value' => $item->id,
            ];
        });
        $data['categories'][0] = [
            'disabled' => true,
            'text' => 'Категория',
            'selected' => $product->category_id ? "" : 'selected',
        ];

        $categories = Category::select('id', 'title')->get()->map(function ($item) use ($product) {
            return [
                'selected' => $product->category_id === $item->id ? 'selected' : '',
                'text' => $item->title,
                'value' => $item->id,
            ];
        })->toArray();
      
        $data['categories'] = array_merge($data['categories'], $categories);
        $data['product'] = $product;
        return view('admin.product.edit', $data);
    }
}
