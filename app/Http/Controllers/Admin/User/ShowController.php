<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(User $user)
    {
        $data['title'] = 'Пользователь'. " " . $user->title;
        $data['breadcrumbs'] = [
            [
                'title' => 'Главная',
                'url' => route('admin.index'),
            ],
            [
                'title' => 'Пользователи',
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
