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
                            <li class="breadcrumb-item active">@lang('site.Dashboard')</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- Small boxes (Stat box) -->
        <div class="row m-auto">
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $data['user_count'] }}</h3>
                        <p>@lang('site.allusers')</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="{{ route('dashboard.users.index') }}" class="small-box-footer">@lang('site.more_info') <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-md-6 ">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $data['cat_count'] }}</h3>
                        <p>@lang('site.allcategories')</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-layer-group"></i>
                    </div>
                    <a href="{{ route('dashboard.categories.index') }}" class="small-box-footer">@lang('site.more_info')
                        <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $data['product_count'] }}</h3>

                        <p>@lang('site.allproducts')</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <a href="{{ route('dashboard.products.index') }}" class="small-box-footer">@lang('site.more_info') <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $data['client_count'] }}</h3>
                        <p>@lang('site.allclients')</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="{{ route('dashboard.clients.index') }}" class="small-box-footer">@lang('site.more_info') <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- ./col -->
        </div>
        <!-- /.row -->
    </div>

@endsection
