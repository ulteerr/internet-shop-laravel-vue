<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Color\StoreRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $store = $request->validated();
        Color::firstOrCreate($store);
        
        return redirect()->route('admin.color.index');
    }
}
