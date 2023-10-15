<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data['title'] = 'Цвета';
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
        $colors = Color::all();
        foreach ($colors as $color) {
            $color->edit  = route('admin.color.show', $color->id);
        }
        $data['colors'] = $colors;

        return view('admin.color.index', $data);
    }
}
