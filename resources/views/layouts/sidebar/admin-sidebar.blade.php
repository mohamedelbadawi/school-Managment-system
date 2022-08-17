<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li class="{{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}">
                            <div class="pull-left"><i class=" ti-home"></i><span class="right-nav-text">Dashboard</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>

                    </li>
                    <li class="{{ Route::currentRouteName() == 'grade.index' ? 'active' : '' }}">
                        <a href="{{ route('grade.index') }}">
                            <div class="pull-left"><i class="fa-solid fa-school"></i><span
                                    class="right-nav-text">{{ trans('sidebar.Grades') }}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>

                    </li>
                    <li class="{{ Route::currentRouteName() == 'level.index' ? 'active' : '' }}">
                        <a href="{{ route('level.index') }}">
                            <div class="pull-left"><i class="fa-solid fa-landmark"></i><span
                                    class="right-nav-text">{{ trans('sidebar.Levels') }}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>

                    </li>
                    <li class="{{ Route::currentRouteName() == 'classroom.index' ? 'active' : '' }}">
                        <a href="{{ route('classroom.index') }}">
                            <div class="pull-left"><i class="fa-solid fa-chalkboard-user"></i><span
                                    class="right-nav-text">Classrooms</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>

                    </li>
                    <li class="{{ Route::currentRouteName() == 'teacher.index' ? 'active' : '' }}">
                        <a href="{{ route('teacher.index') }}">
                            <div class="pull-left"><i class="fa-solid fa-person-chalkboard"></i><span
                                    class="right-nav-text">Teachers</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>

                    </li>
                    <li class="{{ Route::currentRouteName() == 'subject.index' ? 'active' : '' }}">
                        <a href="{{ route('subject.index') }}">
                            <div class="pull-left"><i class="fa-solid fa-file"></i><span
                                    class="right-nav-text">subjects</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>

                    </li>


                    <li class="{{ Route::currentRouteName() == 'invoice.index' ? 'active' : '' }}">
                        <a href="{{ route('invoice.index') }}">
                            <div class="pull-left"><i class="fa-solid fa-file-invoice"></i><span
                                    class="right-nav-text">Invoices</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>

                    </li>
                    <li class="{{ Route::currentRouteName() == 'payment.index' ? 'active' : '' }}">
                        <a href="{{ route('payment.index') }}">
                            <div class="pull-left"><i class="fa fa-money" aria-hidden="true"></i><span
                                    class="right-nav-text">payments</span>
                            </div>

                            <div class="clearfix"></div>
                        </a>

                    </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#students">
                            <div class="pull-left"><i class="fa-solid fa-people-line"></i><span
                                    class="right-nav-text">Students</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="students" class="collapse" data-parent="#sidebarnav">
                            <li class="{{ Route::currentRouteName() == 'student.index' ? 'active' : '' }}"> <a
                                    href="{{ route('student.index') }}">Students</a> </li>
                            <li class="{{ Route::currentRouteName() == 'upgrade.index' ? 'active' : '' }}"> <a
                                    href="{{ route('upgrade.index') }}">upgrades</a> </li>
                            <li class="{{ Route::currentRouteName() == 'upgrade.upgrade_student' ? 'active' : '' }}">
                                <a href="{{ route('upgrade.upgrade_student') }}">upgrade student</a> </li>
                            <li class="{{ Route::currentRouteName() == 'upgrade.graduate_view' ? 'active' : '' }}"> <a
                                    href="{{ route('upgrade.graduate_view') }}">graduateing classrooms</a> </li>
                            <li class="{{ Route::currentRouteName() == 'upgrade.graduated' ? 'active' : '' }}"> <a
                                    href="{{ route('upgrade.graduated') }}">graduated students</a> </li>
                        </ul>

                    </li>
                    <li class="{{ Route::currentRouteName() == 'expense.index' ? 'active' : '' }}">
                        <a href="{{ route('expense.index') }}">
                            <div class="pull-left"><i class="fa-solid fa-money-bill"></i><span
                                    class="right-nav-text">Expenses</span>
                            </div>

                            <div class="clearfix"></div>
                        </a>

                    </li>
                    <li class="{{ Route::currentRouteName() == 'parent.create' ? 'active' : '' }}">
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#parent-menu">
                            <div class="pull-left"> <i class="fa-solid fa-person"></i> <span
                                    class="right-nav-text">Parents</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="parent-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('parent.create') }}">Add parent</a> </li>

                        </ul>
                    </li>
                    <!-- menu title -->

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
