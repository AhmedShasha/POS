<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        //
        $products = Product::all();
        return view("dashboard.products.index" , compact('products'));
    }

    public function create()
    {
        //
        $categories = Category::all();
        $products = Product::all();
        return view("dashboard.products.create", compact('categories'));

    }


    public function store(Request $request)
    {
        //
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        //
        return view("dashboard.products.edit");

    }


    public function update(Request $request, Product $product)
    {
        //
    }


    public function destroy(Product $product)
    {
        //
    }
}
