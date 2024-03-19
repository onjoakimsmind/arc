<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Onjoakimsmind\Arc\Controllers\Admin\Api\PageController;
use Onjoakimsmind\Arc\Controllers\Admin\Api\RevisionController;

Route::group(['prefix' => 'api/admin'], function () {
    Route::group(['prefix' => 'pages'], function () {
        Route::group(['prefix' => '{id}'], function () {
            Route::get('/', [PageController::class, 'get'])->name('admin.pages.get');
            Route::get('css', [PageController::class, 'getCSS'])->name('admin.pages.getCSS');
            Route::get('html', [PageController::class, 'getHTML'])->name('admin.pages.getHTML');
            Route::post('/', [PageController::class, 'update'])->name('admin.pages.update');
            Route::group(['prefix' => 'revisions'], function () {
                Route::get('/', [RevisionController::class, 'index'])->name('admin.pages.revisions.index');
                Route::get('latest', [RevisionController::class, 'latest'])->name('admin.pages.revisions.show');
                Route::post('/', [RevisionController::class, 'store'])->name('admin.pages.revisions.store');
            });
        });
    });
});
