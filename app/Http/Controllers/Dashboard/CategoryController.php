<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class CategoryController extends Controller
{

    public function index()
    {
        //
        $categories = Category::paginate(5);
        return view('dashboard.categories.index' , compact('categories'));
    }

    public function create()
    {
        //
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'name'  =>  'required|unique:categories,name'
        ]);

        Category::created($request->all());
        toast()->success(Lang::get('site.added_successfully'));
        return redirect()->route('dashboard.categories.index');

    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        //
    }

    public function update(Request $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        //
    }
}
