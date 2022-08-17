<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li class="{{ Route::currentRouteName() == 'parent.dashboard' ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}">
                            <div class="pull-left"><i class="fa-solid fa-people-line"></i><span class="right-nav-text">Sons</span>
                            </div>

                            <div class="clearfix"></div>
                        </a>

                    </li>

                    <br>
                    <hr>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sonsResult">
                            <div class="pull-left"><i class="fa-solid fa-square-poll-vertical"></i><span class="right-nav-text">Results</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sonsResult" class="collapse" data-parent="#sidebarnav">
                            @foreach (auth('parent')->user()->sons as $son)
                                <li><a href="{{ route('parent.student.result', $son->id) }}"><i class="fa-solid fa-person"></i> {{ $son->name }}</a>
                                </li>
                            @endforeach

                        </ul>

                    </li>

                    <li class="{{ Route::currentRouteName() == 'parent.attendance' ? 'active' : '' }}">
                        <a href="{{ route('parent.attendance') }}">
                            <div class="pull-left"><i class="fa fa-users" aria-hidden="true"></i></i><span
                                    class="right-nav-text">Attendance</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>

                    <li class="{{ Route::currentRouteName() == 'parent.student.invoice' ? 'active' : '' }}">
                        <a href="{{ route('parent.student.invoice') }}">
                            <div class="pull-left"><i class="fa-solid fa-file-invoice"></i><span class="right-nav-text">Invoices</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>

                    </li>

                    <li class="{{ Route::currentRouteName() == 'parent.student.payment' ? 'active' : '' }}">
                        <a href="{{ route('parent.student.payment') }}">
                            <div class="pull-left"><i class="fa fa-money" aria-hidden="true"></i><span
                                    class="right-nav-text">Payments</span>
                            </div>
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
