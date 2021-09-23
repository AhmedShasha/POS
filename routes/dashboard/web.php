<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ], function () { //...
        Route::prefix('dashboard')->name('dashboard.')
        ->middleware(['auth'])
        ->group(function () {

            Route::get('/index', function () {
                return view('dashboard.index');
            })->name('index');

            Route::resource('categories', CategoryController::class)->except(['show']);
            Route::resource('products', ProductController::class)->except(['show']);
            Route::resource('users', UserController::class)->except(['show']);

        });
    });
