        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/dashboard') }}" class="brand-link">
                <img src="{{ asset('images/website_logo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin Panel</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('images/man_avatar.png') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Hamed Essam</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Dashboard -->
                        <li class="nav-item">
                            <a href="{{ url('/dashboard') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    {{ trans('sidebar.Dashboard') }}
                                </p>
                            </a>
                        </li>

                        <!-- Sections-->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chalkboard"></i>
                                <p>
                                    {{ trans('sidebar.sections') }}
                                    <i class="right fas fa-angle-left"></i>
                                    <span class="badge badge-info right">8</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('sections.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ trans('sidebar.sections') }}</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('sub_sections.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ trans('sidebar.subSections') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Settings-->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>
                                    {{ trans('sidebar.settings') }}
                                    <i class="right fas fa-angle-left"></i>
                                    <span class="badge badge-info right">8</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>TEST</p>
                                    </a>
                                </li>

                            </ul>
                        </li>



                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
