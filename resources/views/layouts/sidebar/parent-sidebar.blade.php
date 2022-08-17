<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li class="{{ Route::currentRouteName() == 'parent.dashboard' ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Sons</span>
                            </div>

                            <div class="clearfix"></div>
                        </a>

                    </li>

                    <br>
                    <hr>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sonsResult">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Results</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sonsResult" class="collapse" data-parent="#sidebarnav">
                            @foreach (auth('parent')->user()->sons as $son)
                                <li> <a href="{{ route('parent.student.result',$son->id) }}">{{ $son->name }}</a> </li>
                            @endforeach

                        </ul>

                    </li>

                    <li class="{{ Route::currentRouteName() == 'parent.attendance' ? 'active' : '' }}">
                        <a href="{{ route('parent.attendance') }}">
                            <div class="pull-left"><i class="fa fa-users" aria-hidden="true"></i></i><span
                                    class="right-nav-text">Attendance</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>


                </ul>
                </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
