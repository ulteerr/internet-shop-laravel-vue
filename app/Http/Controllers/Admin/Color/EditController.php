<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Color $color)
    {
        $data['title'] = 'Редактировать' . " " . $color->title;
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
        $data['color'] = $color;
        return view('admin.color.edit', $data);
    }
}
