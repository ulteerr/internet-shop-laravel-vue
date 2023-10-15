<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Category $category)
    {
        $data['title'] = 'Редактировать' . " " . $category->title;
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
        $data['category'] = $category;
        return view('admin.category.edit', $data);
    }
}
