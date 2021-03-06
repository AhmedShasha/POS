<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as File;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:products_create'])->only('create');
        $this->middleware(['permission:products_read'])->only('index');
        $this->middleware(['permission:products_update'])->only('edit');
        $this->middleware(['permission:products_delete'])->only('destroy');

    }

    public function index(Request $request)
    {
        //
        $products = Product::when($request->search, function ($q) use ($request) {

            return $q->whereTranslationLike('name', '%' . $request->search . '%')
                ->orwhereTranslationLike('description', '%' . $request->search . '%');

        })->when($request->category_id, function ($q) use ($request) {

            return $q->where('category_id', $request->category_id);

        })->latest()->paginate(3);

        return view('dashboard.products.index', compact('products'));
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
        $rules = [];

        foreach (config('translatable.locales') as $locale) {
            # code...
            $rules += [$locale . '.name' => 'required', Rule::unique('product_translations', 'name')];
            $rules += [$locale . '.description' => 'required'];

        }

        $rules += [
            'category_id' => 'required',
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'stock' => 'required',
        ];

        $request->validate($rules);

        $request_data = $request->all(); // expect image from request

        if ($request->image) {
            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/products_images/' . $request->image->hashName())); // hashName() Making hash on names to be Unique

            $request_data['image'] = $request->image->hashName();
        }

        Product::create($request_data);

        toast()->success(Lang::get('site.added_successfully'));

        return redirect()->route('dashboard.products.index');

    }

    public function show(Product $product)
    {
        //
    }

    public function edit($id)
    {
        //
        $product = Product::find($id);
        return view("dashboard.products.edit", compact('product'));

    }

    public function update(Request $request, Product $product)
    {
        //
        $rules = [
            'category_id' => 'required',
        ];

        foreach (config('translatable.locales') as $locale) {
            # code...
            $rules += [$locale . '.name' => 'required', Rule::unique('product_translations', 'name')
                    ->ignore($product->id, 'product_id')];
            $rules += [$locale . '.description' => 'required'];
        }

        $rules += [
            'category_id' => 'required',
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'stock' => 'required',
        ];

        $request->validate($rules);

        $request_data = $request->all();

        if ($request->image) {

            if ($product->image != 'default.png') {

                File::delete('uploads/products_images/' . $product->image);

            }

            Image::make($request->image)->resize(300, null, function ($constraint) {

                $constraint->aspectRatio();

            })->save(public_path('uploads/products_images/' . $request->image->hashName())); // hashName() Making hash on names to be Unique

            $request_data['image'] = $request->image->hashName();
        }

        $product->update($request_data);

        if ($request) {
            toast()->success(Lang::get('site.updated_successfully'));
        }
        return redirect()->route('dashboard.products.index');

    }

    public function destroy($id)
    {
        //
        $product = Product::find($id);
        if ($product->image !== 'default.png') {
            File::delete('uploads/products_images/' . $product->image);
        }
        $product->delete();
        toast()->success(Lang::get('site.deleted_successfully'));
        return redirect()->route('dashboard.products.index');
    }
}
