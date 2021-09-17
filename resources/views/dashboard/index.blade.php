@extends ('layouts.dashboard.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">@lang('site.Dashboard')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">@lang('site.Home')</a></li> --}}
                            <li class="breadcrumb-item active">@lang('site.Dashboard')</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </div>

@endsection
