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
                                    href="{{ route('dashboard.index') }}">@lang('site.Dashboard')</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{ route('dashboard.categories.index') }}">@lang('site.categories')</a></li>
                            <li class="breadcrumb-item">@lang('site.add') @lang('site.category')</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">@lang('site.add') @lang('site.category')</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                @include('partials._errors')

                <form action="{{ route('dashboard.categories.store') }}" method="POST">
                    @csrf
                    {{ csrf_field() }}
                    {{ method_field('post') }}

                    <!--    Name   -->
                    <div class="form-group">
                        <label>@lang('site.name')</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                            placeholder="@lang('site.name')" required>
                    </div>

                    <!--   Button Add     -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary "><i
                                class="fa fa-plus mr-1"></i>@lang('site.add')</button>
                        {{-- <button type="submit" class="btn btn-danger " onclick="{{ route('dashboard.categories.index') }}"><i
                                class="fa fa-category-edit mr-1"></i>@lang('site.cancel')</button> --}}
                    </div>

                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

@endsection
