        <!--=================================
 header start-->
        <nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <!-- logo -->
            <div class="text-left navbar-brand-wrapper">
                <a class="navbar-brand brand-logo" href="{{ route('dashboard') }}"><img src="" alt=""></a>
                <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard') }}"><img
                        src="{{ asset('assets/images/logo-icon-dark.png') }}" alt=""></a>
            </div>
            <!-- Top bar left -->
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                    <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left"
                        href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
                </li>
                <li class="nav-item">
                    <div class="search">
                        <a class="search-btn not_click" href="javascript:void(0);"></a>
                        <div class="search-box not-click">
                            <input type="text" class="not-click form-control" placeholder="Search" value=""
                                name="search">
                            <button class="search-button" type="submit"> <i
                                    class="fa fa-search not-click"></i></button>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- top bar right -->
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item fullscreen">
                    <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
                </li>





                <li class="nav-item dropdown ">
                    <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-language"></i>
                       
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown">
                        <div class="dropdown-header ">
                            <strong>Language</strong>

                        </div>
                        <div class="dropdown-divider"></div>
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                class="dropdown-item"> {{ $properties['native'] }}</a>
                        @endforeach
                    </div>
                </li>


                <li class="nav-item dropdown ">
                    <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="ti-bell"></i>
                        <span class="badge badge-pill badge-danger">{{auth('student')->user()->unreadNotifications->count()}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                        <div class="dropdown-header notifications">
                            <strong>Notifications</strong>
                            
                        </div>
                        <div class="dropdown-divider"></div>
                        @auth('student')

                            @foreach (auth('student')->user()->unreadNotifications as $notification)
                                <div class="p-2">
                                    <a href="{{ route('meeting.index') }}"
                                        class="dropdown-item">{{ $notification->data['teacher'] }}
                                        created a meeting at {{ $notification->data['start_at'] }}

                                        <small
                                            class="float-right text-muted time mt-1">{{ $notification->created_at->diffForHumans() }}</small>
                                    </a>
                                </div>
                            @endforeach
                        @endauth

                    </div>
                </li>

                <li class="nav-item dropdown mr-30">
                    <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="{{ URL::asset('assets/images/student.png') }}" alt="avatar">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header">
                            <div class="media">
                                <div class="media-body">

                                    <h5 class="mt-0 mb-0">{{ auth()->user()->name }} </h5>



                                    <span>{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>


                        <div class="dropdown-divider"></div>

                        @auth('teacher')
                            <a class="dropdown-item" href="{{ route('teacher.profile') }}"><i
                                    class="text-warning ti-user"></i>Profile</a>
                        @endauth

                        @auth('student')
                            <a class="dropdown-item" href="{{ route('student.profile') }}"><i
                                    class="text-warning ti-user"></i>Profile</a>
                        @endauth


                        <div class="dropdown-divider"></div>


                        <form method="post" action="{{ route('logout') }}">


                            @csrf
                            <a class="dropdown-item" href="#"
                                onclick="event.preventDefault();this.closest('form').submit();"><i
                                    class="text-danger ti-unlock"></i>Logout </a>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>


        <!--=================================
header End-->
