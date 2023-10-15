<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Color\UpdateRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Color $color)
    {
        $update = $request->validated();
        $color->update($update);
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
