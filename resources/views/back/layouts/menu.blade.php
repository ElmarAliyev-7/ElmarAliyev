

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
            <div class="sidebar-brand-text mx-3">Admin Panel</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item @if(url()->current() == route('admin.dashboard')) active @endif">
            <a class="nav-link" href="{{route('admin.dashboard')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Addons
        </div>

        <!-- Users -->
        <li class="nav-item
            @if( (url()->current() == route('admin.users')) || (url()->current() == route('admin.create-user'))) active @endif">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#userPages"
                aria-expanded="true" aria-controls="userPages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Users</span>
            </a>
            <div id="userPages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Users</h6>
                    <a class="collapse-item" href="{{route('admin.users')}}">Users</a>
                    @if(AppHelper::instance()->checkPermisson(1) == 1)
                            <a class="collapse-item" href="{{route('admin.create-user')}}">Create User</a>
                    @endif
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Myskills -->
        <li class="nav-item
            @if( (url()->current() == route('admin.skills')) || (url()->current() == route('admin.create-skill'))) active @endif">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#skillsPages"
               aria-expanded="true" aria-controls="userPages">
                <i class="fas fa-fw fa-folder"></i>
                <span>My Skills</span>
            </a>
            <div id="skillsPages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">My Skills</h6>
                    <a class="collapse-item" href="{{route('admin.skills')}}">Skills</a>
                    @if(AppHelper::instance()->checkPermisson(4) == 1)
                            <a class="collapse-item" href="{{route("admin.create-skill")}}">Add Skill</a>
                    @endif
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Experience -->
        <li class="nav-item
            @if( (url()->current() == route('admin.experience')) || (url()->current() == route('admin.create-experience'))) active @endif">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#expPages"
                aria-expanded="true" aria-controls="expPages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Experience & Education</span>
            </a>
            <div id="expPages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Experience & Education</h6>
                    <a class="collapse-item" href="{{route('admin.experience')}}">Experiences</a>
                    @if(AppHelper::instance()->checkPermisson(6) == 1)
                            <a class="collapse-item" href="{{route("admin.create-experience")}}">Add Experience</a>
                    @endif
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Portfolio -->
        <li class="nav-item
            @if( (url()->current() == route('admin.portfolio')) || (url()->current() == route('admin.create-project'))) active @endif">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#portfolioPages"
               aria-expanded="true" aria-controls="userPages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Portfolio</span>
            </a>
            <div id="portfolioPages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Portfolio</h6>
                    <a class="collapse-item" href="{{route('admin.portfolio')}}">Projects</a>
                    @if(AppHelper::instance()->checkPermisson(8) == 1)
                            <a class="collapse-item" href="{{route("admin.create-project")}}">Add Project</a>
                    @endif
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Blogs -->
        <li class="nav-item
            @if( (url()->current() == route('admin.blog')) || (url()->current() == route('admin.create-blog'))) active @endif">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#blogPages"
               aria-expanded="true" aria-controls="userPages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Blogs</span>
            </a>
            <div id="blogPages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Blogs</h6>
                    <a class="collapse-item" href="{{route('admin.blog')}}">Blogs</a>
                    @if(AppHelper::instance()->checkPermisson(16) == 1)
                        <a class="collapse-item" href="{{route("admin.create-blog")}}">Create Blog</a>
                    @endif
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Tasks -->
        <li class="nav-item
            @if( (url()->current() == route('admin.task')) || (url()->current() == route('admin.create-task'))) active @endif">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#taskPages"
               aria-expanded="true" aria-controls="userPages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Tasks</span>
            </a>
            <div id="taskPages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Tasks</h6>
                    <a class="collapse-item" href="{{route('admin.task')}}">Tasks</a>
                    @if(AppHelper::instance()->checkPermisson(19) == 1)
                        <a class="collapse-item" href="{{route("admin.create-task")}}">Create Task</a>
                    @endif
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - HomePage -->
        <li class="nav-item @if(url()->current() == route('admin.home')) active @endif">
            <a class="nav-link" href="{{route("admin.home")}}">
                <span>HomePage</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - About -->
        <li class="nav-item @if(url()->current() == route('admin.about')) active @endif">
            <a class="nav-link" href="{{route("admin.about")}}">
                <span>About</span>
            </a>
        </li>

    @if(AppHelper::instance()->checkPermisson(14) == 1)
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - About -->
        <li class="nav-item @if(url()->current() == route('admin.message')) active @endif">
            <a class="nav-link" href="{{route("admin.message")}}">
                <span>Messages</span>
            </a>
        </li>
    @endif
        <!-- Divider -->
        <hr class="sidebar-divider">

        @if(auth()->user()->id === 1)
         <!-- Nav Item - HomePage -->
         <li class="nav-item @if(url()->current() == route('admin.permissions')) active @endif">
            <a class="nav-link" href="{{route("admin.permissions")}}">
                <span>Give Permission to Role</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        @endif

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search for..." aria-label="Search"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                @if(AppHelper::instance()->checkPermisson(14) == 1)
                    <!-- Nav Item - Messages -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope fa-fw"></i>
                            <!-- Counter - Messages -->
                            <span class="badge badge-danger badge-counter">{{count($unchecked_messages)}}</span>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
                                Message Center
                            </h6>
                            @foreach($unchecked_messages as $unchecked_message)
                            <a class="dropdown-item d-flex align-items-center"
                                   href="{{route('admin.show-message',$unchecked_message->id)}}">
                                <div class="font-weight-bold">
                                    <div class="text-truncate">{{$unchecked_message->name}}</div>
                                    <div class="small text-gray-500">{{$unchecked_message->message}}</div>
                                </div>
                            </a>
                            @endforeach
                            <a class="dropdown-item text-center small text-gray-500"
                               href="{{route('admin.message')}}">Read More Messages</a>
                        </div>
                    </li>
                @endif
                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->username}}</span>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('admin.logout')}}" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>

            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
                </div>

                <!-- Content Row -->
