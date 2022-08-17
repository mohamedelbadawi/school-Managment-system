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
</head>

<body>

    <div class="wrapper">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="{{ asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
        </div>

        <!--=================================
 preloader -->

        @include('layouts.main-header')

        @include('layouts.sidebar.parent-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-0"> Dashboard parent</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>

            {{-- sons --}}
            <div class="mt-4 d-flex justify-content-between flex-wrap">

                @foreach ($sons as $son)
                    <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                        <div class="card-header text-center"> <img src="{{ URL::asset('assets/images/student.png') }}">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-light">{{ $son->name }}</h5>
                            <p class="card-text">Grade: {{ $son->grade->name }} -- Level: {{ $son->level->name }} --
                                class room: {{ $son->classroom->name }} </p>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- end  sons --}}


            @include('layouts.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('layouts.footer-scripts')

</body>

</html>
