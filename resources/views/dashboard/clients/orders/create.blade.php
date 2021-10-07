@extends ('layouts.dashboard.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">@lang('site.add_order')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('dashboard.welcome') }}">@lang('site.Dashboard')</a></li>

                            <li class="breadcrumb-item"><a
                                    href="{{ route('dashboard.clients.index') }}">@lang('site.clients')</a></li>

                            <li class="breadcrumb-item">@lang('site.add') @lang('site.order')</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">@lang('site.add_order')</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body row">

                @include('partials._errors')
                <div class="card card-gray col-md-5 m-auto">
                    <div class="card-header">
                        @lang('site.categories')
                    </div>
                    <div class="card-body">
                        @foreach ($categories as $category)

                            <div class="panel-group">
                                <div class="panel ">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="btn btn-info m-auto" style="width: 100%" data-toggle="collapse"
                                                href="#{{ str_replace(' ', '-', $category->name) }}">{{ $category->name }}</a>
                                        </h4>
                                    </div>
                                    <div class="panel-collapse collapse"
                                        id="{{ str_replace(' ', '-', $category->name) }}">
                                        <div class="panel-body">
                                            @if ($category->products->count() > 0)
                                                <table class="table table-hover">
                                                    <tr>
                                                        <th>@lang('site.name')</th>
                                                        <th>@lang('site.stock')</th>
                                                        <th>@lang('site.price')</th>
                                                        <th>@lang('site.add')</th>
                                                    </tr>
                                                    @foreach ($category->products as $product)
                                                        <tr>
                                                            <td>{{ $product->name }}</td>
                                                            <td>{{ $product->stock }}</td>
                                                            <td>{{ $product->sale_price }}</td>
                                                            <td>
                                                                <a href="" id="product-{{ $product->id }}"
                                                                    data-name="{{ $product->name }}"
                                                                    data-id="{{ $product->id }}"
                                                                    data-price="{{ $product->sale_price }}"
                                                                    class="btn btn-success btn-sm add-product-btn"><i
                                                                        class="fa fa-plus"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            @else
                                                <div class="m-auto">
                                                    <h5 style="text-align: center">@lang('site.no_data_found')</h5>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
                <div class="card card-gray col-md-6 m-auto">
                    <div class="card-header">
                        @lang('site.orders')
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>@lang('site.product')</th>
                                    <th>@lang('site.quantity')</th>
                                    <th>@lang('site.price')</th>
                                    <th>@lang('site.action')</th>
                                </tr>
                            </thead>
                            <tbody class="order-list">

                            </tbody>
                            <tr>
                                <th colspan="4">@lang('site.total') : <span class="total-price"></span></th>
                            </tr>
                            <td colspan="4"><a href="" class="btn btn-success" style="width: 100%">@lang('site.add_order')
                                    <i class="fas fa-plus ml-1"></i></a>
                            </td>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

@endsection
