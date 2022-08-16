<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li class="{{ Route::currentRouteName() == 'teacher.dashboard' ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Dashboard</span>
                            </div>

                            <div class="clearfix"></div>
                        </a>

                    </li>

                    <br>
                    <hr>
                    <li class="{{ Route::currentRouteName() == 'attendance.index' ? 'active' : '' }}">
                        <a href="{{ route('attendance.index') }}">
                            <div class="pull-left"><i class="fa fa-users" aria-hidden="true"></i></i><span
                                    class="right-nav-text">Attendance</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>

                    </li>
                    <li class="{{ Route::currentRouteName() == 'quiz.index'||Route::currentRouteName() =='quiz.create' ? 'active' : '' }}">


                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#quizzes">
                            <div class="pull-left"><i class="fa fa-file-text" aria-hidden="true"></i><span
                                    class="right-nav-text">quizzes</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="quizzes" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('student.quiz.index') }}">quizzes</a> </li>
                        </ul>
                    </li>

                    <li class="{{ Route::currentRouteName() == 'meeting.index' ? 'active' : '' }}">
                        <a href="{{ route('meeting.index') }}">
                            <div class="pull-left"><i class="fa fa-video-camera" aria-hidden="true"></i><span
                                    class="right-nav-text">meetings</span>
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
