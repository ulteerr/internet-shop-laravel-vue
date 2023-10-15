<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $store = $request->validated();
        User::firstOrCreate([
            'email' => $store['email']
        ], $store);

        return redirect()->route('admin.user.index');
    }
}
