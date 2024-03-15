<?php

use Illuminate\Support\Facades\Route;

use Onjoakimsmind\Arc\Controllers\PageController;

Route::get('{page?}', [PageController::class, 'show']);
