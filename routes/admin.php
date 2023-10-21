<?php

use App\Http\Controllers\Admin\MainController;
use Illuminate\Support\Facades\Route;

$namePrefix = 'admin';
$routes = [
    [
        'prefix' => 'categories',
        'namespace' => '\App\Http\Controllers\Admin\Category\\',
        'name' => 'category',
    ],
    [
        'prefix' => 'tags',
        'namespace' => '\App\Http\Controllers\Admin\Tag\\',
        'name' => 'tag',
    ],
    [
        'prefix' => 'colors',
        'namespace' => '\App\Http\Controllers\Admin\Color\\',
        'name' => 'color',
    ],
    [
        'prefix' => 'users',
        'namespace' => '\App\Http\Controllers\Admin\User\\',
        'name' => 'user',
    ],
    [
        'prefix' => 'products',
        'namespace' => '\App\Http\Controllers\Admin\Product\\',
        'name' => 'product',
    ],
];

Route::get('/', MainController::class)->name("{$namePrefix}.index");

foreach ($routes as $route) {
    $namespaceEscaped = str_replace('\\\\', '\\', $route['namespace']);
    Route::group(['prefix' => $route['prefix']], function () use ($namePrefix, $namespaceEscaped, $route) {
        Route::get('/', $namespaceEscaped . 'IndexController')->name("{$namePrefix}.{$route['name']}.index");
        Route::get('/create', $namespaceEscaped . 'CreateController')->name("{$namePrefix}.{$route['name']}.create");
        Route::post('/', $namespaceEscaped . 'StoreController')->name("{$namePrefix}.{$route['name']}.store");
        Route::get('/{' . $route['name'] . '}/edit', $namespaceEscaped . 'EditController')->name("{$namePrefix}.{$route['name']}.edit");
        Route::get('/{' . $route['name'] . '}', $namespaceEscaped . 'ShowController')->name("{$namePrefix}.{$route['name']}.show");
        Route::patch('/{' . $route['name'] . '}', $namespaceEscaped . 'UpdateController')->name("{$namePrefix}.{$route['name']}.update");
        Route::delete('/{' . $route['name'] . '}', $namespaceEscaped . 'DeleteController')->name("{$namePrefix}.{$route['name']}.delete");
        Route::delete('/{' . $route['name'] . '}/delete-image', [$namespaceEscaped . 'DeleteController', 'deleteImage']);
    });
}
