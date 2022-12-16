<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="{{ asset('images/website_logo.png') }}" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titlePage')</title>
    @include('layouts.head-scripts')
    @yield('head_scripts')
    @toastr_css
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

    <div class="wrapper">

        <!--=================================
 preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{ asset('images/website_logo.png') }}" alt="Admin Logo" height="60"
                width="60">
        </div> --}}

        <!--=================================
 preloader -->

        @include('layouts.top-bar')

        @include('layouts.sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('titlePage')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">dashboard</a></li>
                                <li class="breadcrumb-item active">@yield('titlePage')</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            @yield('page-header')
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')

                </div>
            </section>

            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

            @include('layouts.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('layouts.footer-scripts')
    @yield('footer_scripts')

</body>

</html>
