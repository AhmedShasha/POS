@extends ('layouts.dashboard.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">@lang('site.products')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('dashboard.index') }}">@lang('site.Dashboard')</a>
                            </li>
                            <li class="breadcrumb-item active">@lang('site.products')</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">@lang('site.products')</h3>
            </div>
            <!-- /.card-header -->
            <!-- Table start -->
            @if ($products->count() > 0)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title m-1">@lang('site.products') <small
                                class="ml-2">{{ $products->count() }}</small></h3>

                        <!-- Form search  -->
                        <form action="{{ route('dashboard.products.index') }}" method="GET">
                            <div class="row">
                                <div class="col-md-4 ">
                                    <input type="text" name="search" class="form-control"
                                        placeholder="@lang('site.search')" value="{{ request()->search }}">
                                </div>
                                <div class="col-md-4 m-1">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-search mr-1"></i>@lang('site.search')</button>

                                    @if (auth()->user()->hasPermission('products_create'))
                                        <a href="{{ route('dashboard.products.create') }}" class="btn btn-sm btn-success">
                                            <i class="fa fa-plus mr-1"></i>@lang('site.add')</a>
                                    @else
                                        <button class="btn btn-sm btn-success disabled">
                                            <i class="fa fa-plus mr-1"></i>@lang('site.add')</button>
                                    @endif


                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>@lang('site.name')</th>
                                    <th>@lang('site.description')</th>
                                    <th>@lang('site.image')</th>
                                    <th>@lang('site.purchase_price')</th>
                                    <th>@lang('site.sale_price')</th>
                                    <th>@lang('site.stock')</th>
                                    <th>@lang('site.action')</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $index => $product)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{!! $product->description !!}</td>
                                        <td style="width: 75px;"><img src="{{ $product->image_path }}" style="width: 50px"
                                                class="img-square" alt=""></td>
                                        <td>{{ $product->purchase_price }}</td>
                                        <td>{{ $product->sale_price }}</td>
                                        <td>{{ $product->stock }}</td>

                                        <td>
                                            @if (auth()->user()->hasPermission('products_update'))
                                                <a class="btn btn-info btn-sm"
                                                    href="{{ route('dashboard.products.edit', $product->id) }}"><i
                                                        class="fa fa-edit mr-1"></i>@lang('site.edit')</a>
                                            @else
                                                <button class="btn btn-info btn-sm disabled"><i
                                                        class="fa fa-edit mr-1"></i>@lang('site.edit')</button>
                                            @endif

                                            @if (auth()->user()->hasPermission('products_delete'))
                                                <form action="{{ route('dashboard.products.destroy', $product->id) }}"
                                                    method="POST" style="display:inline-block;">
                                                    {{ csrf_field() }}
                                                    {{ method_field('delete') }}
                                                    <button type="submit" class="btn btn-danger btn-sm delete"
                                                        onclick="return confirm('Are you sure you want to delete this product?!')"><i
                                                            class="fa fa-trash mr-1"></i>@lang('site.delete')</button>
                                                </form>
                                            @else
                                                <button class="btn btn-danger btn-sm disabled"><i
                                                        class="fa fa-trash mr-1"></i> @lang('site.delete')</button>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="width: fit-content;margin: auto;margin-top: 15px;">
                            {{-- {{ $products->appends(request()->query())->links() }} --}}
                        </div>
                    </div>
                    <!-- /.card-body -->

                </div>
            @else
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title m-1">@lang('site.products') <small
                                class="ml-2">{{ $products->count() }}</small></h3>
                        <!-- Form search  -->
                        <form action="{{ route('dashboard.products.index') }}" method="GET">
                            <div class="row">
                                <div class="col-md-4 ">
                                    <input type="text" name="search" class="form-control"
                                        placeholder="@lang('site.search')" value="{{ request()->search }}">
                                </div>
                                <div class="col-md-4 m-1">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-search mr-1"></i>@lang('site.search')</button>

                                    @if (auth()->user()->hasPermission('products_create'))
                                        <a href="{{ route('dashboard.products.create') }}"
                                            class="btn btn-sm btn-success">
                                            <i class="fa fa-plus mr-1"></i>@lang('site.add')</a>
                                    @else
                                        <button class="btn btn-sm btn-success disabled">
                                            <i class="fa fa-plus mr-1"></i>@lang('site.add')</button>
                                    @endif
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <h2 class="m-auto">@lang('site.no_data_found')</h2>
            @endif

        </div>
    </div>
@endsection
