@extends ('layouts.dashboard.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">@lang('site.add')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('dashboard.welcome') }}">@lang('site.Dashboard')</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{ route('dashboard.clients.index') }}">@lang('site.clients')</a></li>
                            <li class="breadcrumb-item">@lang('site.add') @lang('site.client')</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">@lang('site.add') @lang('site.client')</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                @include('partials._errors')

                <form action="{{ route('dashboard.clients.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ csrf_field() }}
                    {{ method_field('post') }}

                    <div class="col">
                        <div class="row">
                            <!--    Name   -->
                            <div class="form-group col-md-4">
                                <label>@lang('site.name')</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                    placeholder="@lang('site.name')">
                            </div>

                            <!--    Phone   -->

                            @for ($i = 0; $i < 1; $i++)
                                <div class="form-group col-md-3">
                                    <label>@lang('site.phone')</label>
                                    <input type="number" class="form-control" name="phone[]"
                                        placeholder="@lang('site.phoneNum')">
                                </div>
                            @endfor

                            <!--    ِAddress   -->

                            <div class="form-group col-md-5">
                                <label>@lang('site.address')</label>
                                <input type="tel" name="address" class="form-control" value="{{ old('address') }}"
                                    placeholder="@lang('site.address')">
                            </div>
                        </div>
                    </div>
                    <!--   Button Add     -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary "><i
                                class="fa fa-plus mr-1"></i>@lang('site.add')</button>
                        <a class="btn btn-danger" href="{{ route('dashboard.clients.index') }}"><i
                                class="fa fa-category-edit mr-1">
                            </i>
                            @lang('site.cancel')</a>
                    </div>

                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

@endsection
