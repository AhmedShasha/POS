@extends ('layouts.dashboard.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">@lang('site.edit')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('dashboard.index') }}">@lang('site.Dashboard')</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{ route('dashboard.products.index') }}">@lang('site.products')</a></li>
                            <li class="breadcrumb-item">@lang('site.edit') @lang('site.product')</li>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">@lang('site.edit') @lang('site.product')</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                @include('partials._errors')

                <form action="{{ route('dashboard.products.update', $product->id) }}" method="POST"
                    enctype="multipart/form-data">


                    @method('put')
                    @csrf

                    <div class="col">
                        <div class="row">
                            @foreach (config('translatable.locales') as $locale)
                                <!--    Name   -->
                                <div class="form-group col-md-6">
                                    <label>@lang('site.'. $locale .'.name')</label>
                                    <input type="text" name="{{ $locale }}[name]" class="form-control"
                                        value="{{ $product->translate($locale)->name }}" placeholder="@lang('site.name')">
                                </div>
                            @endforeach

                            @foreach (config('translatable.locales') as $locale)

                                <div class="form-group col-md-6">
                                    <label>@lang('site.'. $locale .'.description')</label>
                                    <textarea name="{{ $locale }}[description]" class="form-control ckeditor"
                                        placeholder="@lang('site.description')">{{ $product->translate($locale)->description }}</textarea>
                                </div>
                            @endforeach
                        </div>

                        <div class="row">
                            <!--    categories      -->

                            <div class="form-group col-md-2">
                                <label>@lang('site.category')</label>
                                <select name="category_id" class="form-control">
                                    <option value="">@lang('site.allcategories')</option>
                                    @foreach ($ShareData['category'] as $category)
                                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id  ? 'selected' : ''}}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!--    Price      -->
                            <div class="form-group col-md-2">
                                <label>@lang('site.purchase_price')</label>
                                <input type="number" name="purchase_price" class="form-control"
                                    value="{{ $product->purchase_price }}">
                            </div>

                            <div class="form-group col-md-2">
                                <label>@lang('site.sale_price')</label>
                                <input type="number" name="sale_price" class="form-control"
                                    value="{{ $product->sale_price }}">
                            </div>

                            <div class="form-group col-md-2">
                                <label>@lang('site.stock')</label>
                                <input type="number" name="stock" class="form-control" value="{{ $product->stock }}">
                            </div>
                            <!--    Image      -->

                            <div class="form-group col-md-2">
                                <label>@lang('site.image')</label>
                                <input type="file" name="image" class="form-control image btn btn-small">
                            </div>

                            <div class="form-group col-md-2">
                                <img style="width: 100px" class="img-thumbnail image-preview"
                                    src="{{ $product->image_path }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary "><i
                                class="fa fa-user-edit mr-1"></i>@lang('site.edit')</button>
                        <a class="btn btn-danger" href="{{ route('dashboard.products.index') }}"><i
                                class="fa fa-category-edit mr-1"></i>@lang('site.cancel')</a>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

@endsection
