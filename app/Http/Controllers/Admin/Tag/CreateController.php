<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $data['title'] = 'Добавить тег';
        $data['breadcrumbs'] = [
            [
                'title' => 'Главная',
                'url' => route('admin.index'),
            ],
            [
                'title' => $data['title'],
                'url' => route('admin.tag.index'),
            ],
        ];
        return view('admin.tag.create',$data);
    }
}
