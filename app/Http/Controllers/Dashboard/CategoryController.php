<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:categories_create'])->only('create');
        $this->middleware(['permission:categories_read'])->only('index');
        $this->middleware(['permission:categories_update'])->only('edit');
        $this->middleware(['permission:categories_delete'])->only('destroy');

    }
    public function index(Request $request)
    {
        //
        $categories = Category::where(function ($q) use ($request) {

            return $q->when($request->search, function ($q) use ($request) {

                return $q->whereTranslationLike('name', '%' . $request->search . '%');

            });
        })->latest()->paginate(3);

        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        //
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        //
        $rules = [];

        foreach (config('translatable.locales') as $locale) {
            # code...
            $rules += [$locale . '.name' => 'required', Rule::unique('category_translations', 'name')];
        }

        $request->validate($rules);

        Category::create($request->all());
        toast()->success(Lang::get('site.added_successfully'));
        return redirect()->route('dashboard.categories.index');

    }

    public function show(Category $category)
    {
        //
    }

    public function edit($id)
    {

        $categories = Category::find($id);
        return view('dashboard.categories.edit', compact('categories'));
    }

    public function update(Request $request, Category $category)
    {
        //
        $rules = [];

        foreach (config('translatable.locales') as $locale) {
            # code...
            $rules += [$locale . '.name' => ['required', Rule::unique('category_translations','name')->ignore($category->id , 'category_id')]];
        }

        $request->validate($rules);

        $category->update($request->all());
        toast()->success(Lang::get('site.updated_successfully'));
        return redirect()->route('dashboard.categories.index');
    }

    public function destroy(Category $category)
    {

        // $category = Category::find($id);
        $category->delete();
        toast()->success(Lang::get('site.deleted_successfully'));

        return redirect()->route('dashboard.categories.index');
    }
}
