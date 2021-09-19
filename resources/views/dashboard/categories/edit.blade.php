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
                                    href="{{ route('dashboard.categories.index') }}">@lang('site.categories')</a></li>
                            <li class="breadcrumb-item">@lang('site.edit') @lang('site.category')</li>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">@lang('site.edit') @lang('site.category')</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                @include('partials._errors')

                <form action="{{ route('dashboard.categories.update', $categories->id) }}" method="POST"
                    enctype="multipart/form-data">

                    {{-- {{ csrf_field() }}
                    {{ method_field('POST') }} --}}

                    @method('put')
                    @csrf

                    <div class="form-group">
                        <label>@lang('site.name')</label>
                        <input type="text" name="name" class="form-control" value="{{ $categories->name }}"
                            placeholder="Name" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary "><i
                            class="fa fa-edit mr-1"></i>@lang('site.edit')</button>
                        {{-- <button type="submit" class="btn btn-danger" onclick="{{ route('dashboard.categories.index') }}"><i
                                class="fa fa-category-edit mr-1"></i>@lang('site.cancel')</button> --}}
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

@endsection
