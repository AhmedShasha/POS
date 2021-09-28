<?php

namespace App\Providers;

use App\Category;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
         //its just a dummy data object.

         $dataShare['user'] = User::get();
         $dataShare['product'] = Product::with('translations')->get();
         $dataShare['category'] = Category::with('translations')->get();

         // Sharing is caring
         View::share('ShareData', $dataShare);
        Schema::defaultStringLength(191);
    }
}
