<?php

namespace App\Http\Controllers\Dashboard\Client;

use App\Category;
use App\Client;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        //
    }

    public function create(Client $client)
    {
        //
        $categories = Category::with('products')->get();
        return view('dashboard.clients.orders.create' , compact('categories' , 'client'));
    }

    public function store(Request $request, Client $client)
    {
        //
    }

    public function show(Order $order)
    {
        //
    }

    public function edit(Order $order ,Request $request)
    {
        //
    }

    public function update(Request $request, Client $client, Order $order)
    {
        //
    }

    public function destroy(Order $order, Client $client)
    {
        //
    }
}
