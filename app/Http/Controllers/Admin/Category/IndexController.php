<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data['title'] = 'Категории';
        $data['breadcrumbs'] = [
            [
                'title' => 'Главная',
                'url' => route('admin.index'),
            ],
            [
                'title' => $data['title'],
                'url' => route('admin.category.index'),
            ],
        ];
        $categories = Category::all();
        foreach ($categories as $category) {
            $category->edit  = route('admin.category.show', $category->id);
        }
        $data['categories'] = $categories;

        return view('admin.category.index', $data);
    }
}
