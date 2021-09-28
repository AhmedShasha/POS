<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\User;


class DashboardController extends Controller
{
    // index function
    public function index() {

        $data['cat_count'] = Category::count();
        $data['product_count'] = Product::count();
        $data['user_count'] = User::whereRoleIs('admin')->count();

        return view('dashboard.index',compact('data'));

    }// end of index
}
