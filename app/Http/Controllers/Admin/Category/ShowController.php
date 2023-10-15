<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Category $category)
    {
        $data['title'] = 'Категория'. " " . $category->title;
        $data['breadcrumbs'] = [
            [
                'title' => 'Главная',
                'url' => route('admin.index'),
            ],
            [
                'title' => 'Категории',
                'url' => route('admin.category.index'),
            ],
            [
                'title' => $data['title'],
                'url' => route('admin.category.show', $category->id),
            ],
        ];
        $data['category'] = $category;
        return view('admin.category.show', $data);
    }
}
