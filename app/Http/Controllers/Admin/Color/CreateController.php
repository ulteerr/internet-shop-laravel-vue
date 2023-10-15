<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $data['title'] = 'Добавить цвет';
        $data['breadcrumbs'] = [
            [
                'title' => 'Главная',
                'url' => route('admin.index'),
            ],
            [
                'title' => $data['title'],
                'url' => route('admin.color.index'),
            ],
        ];
        return view('admin.color.create',$data);
    }
}
