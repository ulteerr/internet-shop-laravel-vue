<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Category $category)
    {
        $update = $request->validated();
        $category->update($update);
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
