<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Client;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\User;


class WelcomeController extends Controller
{
    // welcome function
    public function welcome() {

        $data['cat_count'] = Category::count();
        $data['product_count'] = Product::count();
        $data['client_count'] = Client::count();
        $data['order_count'] = Order::count();
        $data['user_count'] = User::whereRoleIs('admin')->count();

        return view('dashboard.welcome',compact('data'));

    }// end of welcome
}
