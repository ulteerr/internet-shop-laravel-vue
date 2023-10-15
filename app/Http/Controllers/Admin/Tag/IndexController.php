<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data['title'] = 'Теги';
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
        $tags = Tag::all();
        foreach ($tags as $tag) {
            $tag->edit  = route('admin.tag.show', $tag->id);
        }
        $data['tags'] = $tags;

        return view('admin.tag.index', $data);
    }
}
