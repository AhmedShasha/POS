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

            // Dashboard Routes
            Route::get('/', 'WelcomeController@welcome')->name('welcome');

            // Category routes
            Route::resource('categories', CategoryController::class)->except(['show']);

            // Products routes
            Route::resource('products', ProductController::class)->except(['show']);

            // Clients routes
            Route::resource('clients', ClientController::class)->except(['show']);
            Route::resource('clients.orders', 'Client\OrderController')->except(['show']);

            // User routes
            Route::resource('users', UserController::class)->except(['show']);

        });
    });
