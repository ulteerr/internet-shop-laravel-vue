<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Tag $tag)
    {
        $update = $request->validated();
        $tag->update($update);
        $data['title'] = 'Тег'. " " . $tag->title;
        $data['breadcrumbs'] = [
            [
                'title' => 'Главная',
                'url' => route('admin.index'),
            ],
            [
                'title' => 'Теги',
                'url' => route('admin.tag.index'),
            ],
            [
                'title' => $data['title'],
                'url' => route('admin.tag.show', $tag->id),
            ],
        ];
        $data['tag'] = $tag;
        return view('admin.tag.show', $data);
    }
}
