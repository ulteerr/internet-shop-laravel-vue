<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Color $color)
    {
        $data['title'] = 'Цвет'. " " . $color->title;
        $data['breadcrumbs'] = [
            [
                'title' => 'Главная',
                'url' => route('admin.index'),
            ],
            [
                'title' => 'Цвета',
                'url' => route('admin.color.index'),
            ],
            [
                'title' => $data['title'],
                'url' => route('admin.color.show', $color->id),
            ],
        ];
        $data['color'] = $color;
        return view('admin.color.show', $data);
    }
}
