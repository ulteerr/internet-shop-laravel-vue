<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data['title'] = 'Пользователи';
        $data['breadcrumbs'] = [
            [
                'title' => 'Главная',
                'url' => route('admin.index'),
            ],
            [
                'title' => $data['title'],
                'url' => route('admin.user.index'),
            ],
        ];
        $users = User::all();
        foreach ($users as $user) {
            $user->edit  = route('admin.user.show', $user->id);
        }
        $data['users'] = $users;

        return view('admin.user.index', $data);
    }
}
