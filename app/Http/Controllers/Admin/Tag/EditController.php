<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $data['title'] = 'Редактировать' . " " . $tag->title;
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
        $data['tag'] = $tag;
        return view('admin.tag.edit', $data);
    }
}
