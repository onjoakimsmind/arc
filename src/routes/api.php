<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Onjoakimsmind\Arc\Controllers\Admin\Api\PageController;

Route::group(['prefix' => 'api/admin'], function () {
    Route::get('pages/{slug}/css', [PageController::class, 'getCSS']);
    Route::get('pages/{slug}/html', [PageController::class, 'getHTML']);
    Route::get('pages/{slug}/htmlparser', [PageController::class, 'htmlParser']);
    Route::put('pages/{slug}', [PageController::class, 'update'])->name('admin.pages.update');
});
