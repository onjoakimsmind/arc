<?php

use Illuminate\Support\Facades\Route;

use Onjoakimsmind\Arc\Controllers\Admin\PageController;

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('admin::pages.dashboard');
    })->name('admin.dashboard');
    Route::group(['prefix' => 'pages'], function () {
        Route::get('/', [PageController::class, 'index'])->name('admin.pages.index');
        Route::get('new', [PageController::class, 'create'])->name('admin.pages.create');
        Route::get('{id}', [PageController::class, 'show'])->name('admin.pages.show');
        Route::post('/', [PageController::class, 'store'])->name('admin.pages.store');
    });

    Route::get('settings', function () {
        dd('Settings');
    })->name('admin.settings');
});
