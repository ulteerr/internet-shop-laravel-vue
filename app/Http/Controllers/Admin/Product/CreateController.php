<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Tag;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $data['tags'] = Tag::select('id', 'title')->get()->map(function ($item) {
            return [
                'selected' => old('tags') != null && in_array($item->id, old('tags')) ? 'selected' : '',
                'text' => $item->title,
                'value' => $item->id,
            ];
        });;
        $data['colors'] = Color::select('id', 'title')->get()->map(function ($item) {
            return [
                'selected' => old('colors') != null && in_array($item->id, old('colors')) ? 'selected' : '',
                'text' => $item->title,
                'value' => $item->id,
            ];
        });
        $data['categories'][0] = [
            'disabled' => true,
            'selected' => old('category_id') ? '' : 'selected',
            'text' => 'Категория',
        ];

        $categories = Category::select('id', 'title')->get()->map(function ($item) {
            return [
                'selected' => old('category_id') === $item->id ? 'selected' : '',
                'text' => $item->title,
                'value' => $item->id,
            ];
        })->toArray();
        $data['categories']= array_merge($data['categories'],$categories);
        
        $data['title'] = 'Добавить продукт';
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
        return view('admin.product.create', $data);
    }
}
