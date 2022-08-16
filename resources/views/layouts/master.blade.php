<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')
    @livewireStyles

    @toastr_css
</head>

<body>

    <div class="wrapper">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="assets/images/pre-loader/loader-01.svg" alt="">
        </div>

        <!--=================================
 preloader -->

        @include('layouts.main-header')
        {{-- @dd(auth()->guard('web')) --}}
        {{-- @include('layouts.main-header') --}}
        @if (auth('teacher')->check())
            @include('layouts.sidebar.teacher-sidebar')
        @endif
        @if (auth('web')->check())
            @include('layouts.sidebar.admin-sidebar')
        @endif
        @if (auth('student')->check())
            @include('layouts.sidebar.student-sidebar')
        @endif

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">

            @yield('page-header')
            @if ($errors->any())
                <div class="alert alert-danger mt-5">
                    <p><strong>Opps Something went wrong</strong></p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')

            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

            {{-- @include('layouts.footer') --}}
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('layouts.footer-scripts')

    @toastr_js
    @toastr_render


</body>

</html>
