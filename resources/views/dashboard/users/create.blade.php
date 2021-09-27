@extends ('layouts.dashboard.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
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
                                    href="{{ route('dashboard.users.index') }}">@lang('site.users')</a></li>
                            <li class="breadcrumb-item">@lang('site.add') @lang('site.user')</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">@lang('site.add') @lang('site.user')</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                @include('partials._errors')

                <form action="{{ route('dashboard.users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ csrf_field() }}
                    {{ method_field('post') }}

                    <div class="col">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <!--    First name   -->
                                <label>@lang('site.first_name')</label>
                                <input type="text" name="first_name" class="form-control"
                                    value="{{ old('first_name') }}" placeholder="@lang('site.first_name')" required>
                            </div>

                            <div class="form-group col-md-6">
                                <!--    Last name   -->
                                <label>@lang('site.last_name')</label>
                                <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}"
                                    placeholder="@lang('site.last_name')" required>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <!--    Email      -->
                                <label>@lang('site.email')</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                    placeholder="@lang('site.email')" required>
                            </div>
                            <div class="form-group col-md-4">
                                <!--    Password   -->
                                <label>@lang('site.password')</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="@lang('site.password')" required>
                            </div>

                            <div class="form-group col-md-4">
                                <!--    Password Confirmation   -->
                                <label>@lang('site.password_confirm')</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="@lang('site.password_confirm')" required>
                            </div>
                        </div>
                        <div class="row">

                            <div class="form-group col-md-9 mr-auto">
                                <!--   Permissions    -->
                                <label>@lang('site.permissions')</label>

                                <div class="card">
                                    <div class="card-header d-flex p-0">
                                        <h3 class="card-title p-3">@lang('site.permissions')</h3>

                                        <ul class="nav nav-pills ml-auto p-2">
                                            @foreach ($taps as $index => $tap)
                                                <li class="nav-item">
                                                    <a class="nav-link {{ $index == 0 ? 'active' : '' }}"
                                                        href="#{{ $tap }}" data-toggle="tab">@lang('site.' .
                                                        $tap)</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div><!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="tab-content">

                                            @foreach ($taps as $index => $tap)
                                                <!-- For DRY (Don't Rebeat Yourself)-->

                                                <div class="tab-pane {{ $index == 0 ? 'active' : '' }}"
                                                    id="{{ $tap }}">
                                                    @foreach ($cruds as $crud)
                                                        <label class="mr-2 " style="font-weight: 400;"><input
                                                                class="mr-1 " type="checkbox" name="permissions[]"
                                                                value="{{ $tap . '_' . $crud }}">@lang('site.'.
                                                            $crud)</label>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                            <!-- /.tab-pane -->
                                        </div>
                                        <!-- /.tab-content -->
                                    </div><!-- /.card-body -->
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <!--    Image      -->
                                    <label>@lang('site.image')</label>
                                    <input type="file" name="image" class="form-control image btn btn-small">
                                </div>

                                <div class="form-group ">
                                    <img style="width: 75px" class="img-thumbnail image-preview"
                                        src="{{ asset('uploads/users_images/Userdefault.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <!--   Button Add     -->
                        <button type="submit" class="btn btn-primary "><i
                                class="fa fa-plus mr-1"></i>@lang('site.add')</button>
                        <a class="btn btn-danger" href="{{ route('dashboard.users.index') }}"><i
                                class="fa fa-category-edit mr-1"></i>@lang('site.cancel')</a>
                    </div>

                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

@endsection
