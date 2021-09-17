<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Dashboard</title>
    @if (app()->getLocale() == 'ar')

        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ url('/') }}/pluginsRTL/fontawesome-free/css/all.min.css">

        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ url('/') }}/pluginsRTL/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ url('/') }}/distRTL/css/adminlte.min.css">

        <!-- summernote -->
        <link rel="stylesheet" href="{{ url('/') }}/pluginsRTL/summernote/summernote-bs4.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="http://fonts.cdnfonts.com/css/cairo" rel="stylesheet">
        <!-- Bootstrap 4 RTL -->
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
        <!-- Custom style for RTL -->
        <link rel="stylesheet" href="{{ url('/') }}/distRTL/css/custom.css">

    @else
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ url('/') }}/plugins/fontawesome-free/css/all.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ url('/') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ url('/') }}/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ url('/') }}/pluginsRTL/summernote/summernote-bs4.css">
    @endif
    @yield('css')
</head>
@if (app()->getLocale() == 'ar')

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ route('dashboard.index') }}" class="nav-link">@lang('site.Home')</a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav mr-auto-navbav">
                    <!-- Languages Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fa fa-globe-africa "></i>
                            <span
                                class="badge badge-warning navbar-badge">{{ count(LaravelLocalization::getSupportedLocales()) }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header text-center">@lang('site.Langs')</span>
                            <div class="dropdown-divider"></div>
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            @endforeach
                        </div>
                    </li>

                    <!-- User Card -->
                    <li class="dropdown nav-item user-header">
                        <div class="avatar" style="cursor: pointer;">
                            <div class="nav-link" href="#">
                                <img alt="User Image" src="{{ asset('dist/img/user2-160x160.jpg') }}"
                                    decoding="async" class="rounded-circle" style="max-height:120%">
                                {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->
        @else


            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ route('dashboard.index') }}" class="nav-link">@lang('site.Home')</a>
                    </li>
                </ul>

                <!-- SEARCH FORM -->
                <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Languages Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fa fa-globe-africa"></i>
                            <span
                                class="badge badge-warning navbar-badge">{{ count(LaravelLocalization::getSupportedLocales()) }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header text-center">@lang('site.Langs')</span>
                            <div class="dropdown-divider"></div>
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            @endforeach
                        </div>
                    </li>
                    <li class="dropdown nav-item">
                        <div class="avatar" style="cursor: pointer;">
                            <div class="nav-link" href="#">
                                <img alt="User Image" src="{{ asset('dist/img/user2-160x160.jpg') }}"
                                    decoding="async" class="rounded-circle" style="max-height:120%">
                                {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->
        </div>
    </body>
@endif

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard.index') }}" class="brand-link">
        <img src="{{ url('/') }}/dist/img/POSLogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">POS System</span>
    </a>

    <!-- Sidebar -->
    <div
        class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">

        <!-- Sidebar Menu -->
        <nav class="mt-2 ">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <span>@lang('site.Dashboard')</span>
                    </a>
                </li>
                @if (auth()->user()->hasPermission('users_read'))
                    <li class="nav-item">
                        <a href="{{ route('dashboard.users.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <span>@lang('site.users')</span>
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a href="{{ route('dashboard.categories.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-layer-group"></i>
                        <span>@lang('site.categories')</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="nav-icon fa fa-sign-out-alt"></i>
                        <span>@lang('site.logout')</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
        <div class="os-scrollbar-track">
            <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
        </div>
    </div>
    <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
        <div class="os-scrollbar-track">
            <div class="os-scrollbar-handle" style="height: 20.7811%; transform: translate(0px, 0px);"></div>
        </div>
    </div>
    <div class="os-scrollbar-corner"></div>
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Main content -->
<section class="content">
    @include('sweetalert::alert')

    @yield('content')
    @include('partials._sessions')
</section>
<!-- /.content -->

</div>

<!-- jQuery -->
<script src="{{ url('/') }}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('/') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ url('/') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ url('/') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('/') }}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('/') }}/dist/js/demo.js"></script>
<script src="{{ url('/') }}/js/printThis.js"></script>
@yield('js')

<script>
    $(".image").change(function() {

        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.image-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        } else {
            alert('select a file to see preview');
            $('.image-preview').attr('src', '');
        }
    });
</script>

</body>

</html>
