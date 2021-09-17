@extends ('layouts.dashboard.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">@lang('site.users')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('dashboard.index') }}">@lang('site.Dashboard')</a>
                            </li>
                            <li class="breadcrumb-item active">@lang('site.users')</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">@lang('site.users')</h3>
            </div>
            <!-- /.card-header -->
            <!-- Table start -->
            @if ($users->count() > 0)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title m-1">@lang('site.users') <small
                                class="ml-2">{{ $users->total() }}</small></h3>

                        <!-- Form search  -->
                        <form action="{{ route('dashboard.users.index') }}" method="GET">
                            <div class="row">
                                <div class="col-md-4 ">
                                    <input type="text" name="search" class="form-control"
                                        placeholder="@lang('site.search')" value="{{ request()->search }}">
                                </div>
                                <div class="col-md-4 m-1">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-search mr-1"></i>@lang('site.search')</button>

                                    @if (auth()->user()->hasPermission('users_create'))
                                        <a href="{{ route('dashboard.users.create') }}" class="btn btn-sm btn-success">
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
                                    <th>@lang('site.first_name')</th>
                                    <th>@lang('site.last_name')</th>
                                    <th>@lang('site.email')</th>
                                    <th>@lang('site.image')</th>
                                    <th>@lang('site.action')</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->last_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td style="width: 75px;"><img src="{{ $user->image_path }}" style="width: 50px"
                                                class="img-circle" alt=""></td>
                                        <td>
                                            @if (auth()->user()->hasPermission('users_update'))
                                                <a class="btn btn-info btn-sm"
                                                    href="{{ route('dashboard.users.edit', $user->id) }}"><i
                                                        class="fa fa-edit mr-1"></i>@lang('site.edit')</a>
                                            @else
                                                <button class="btn btn-info btn-sm disabled"><i
                                                        class="fa fa-edit mr-1"></i>@lang('site.edit')</button>
                                            @endif

                                            @if (auth()->user()->hasPermission('users_delete'))
                                                <form action="{{ route('dashboard.users.destroy', $user->id) }}"
                                                    method="POST" style="display:inline-block;">
                                                    {{ csrf_field() }}
                                                    {{ method_field('delete') }}
                                                    <button type="submit" class="btn btn-danger btn-sm delete"
                                                        onclick="return confirm('Are you sure you want to delete this user?!')"><i
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
                            {{ $users->appends(request()->query())->links() }}
                        </div>
                    </div>
                    <!-- /.card-body -->

                </div>
            @else
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title m-1">@lang('site.users') <small
                                class="ml-2">{{ $users->total() }}</small></h3>
                        <!-- Form search  -->
                        <form action="{{ route('dashboard.users.index') }}" method="GET">
                            <div class="row">
                                <div class="col-md-4 ">
                                    <input type="text" name="search" class="form-control"
                                        placeholder="@lang('site.search')" value="{{ request()->search }}">
                                </div>
                                <div class="col-md-4 m-1">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-search mr-1"></i>@lang('site.search')</button>

                                    @if (auth()->user()->hasPermission('users_create'))
                                        <a href="{{ route('dashboard.users.create') }}" class="btn btn-sm btn-success">
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
