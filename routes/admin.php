<?php

use App\Http\Controllers\Admin\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', MainController::class)->name('admin.index');
