<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        $update = $request->validated();
        $user->update($update);
        $data['title'] = 'Тег'. " " . $user->title;
        $data['breadcrumbs'] = [
            [
                'title' => 'Главная',
                'url' => route('admin.index'),
            ],
            [
                'title' => 'Теги',
                'url' => route('admin.user.index'),
            ],
            [
                'title' => $data['title'],
                'url' => route('admin.user.show', $user->id),
            ],
        ];
        $data['user'] = $user;
        return view('admin.user.show', $data);
    }
}
