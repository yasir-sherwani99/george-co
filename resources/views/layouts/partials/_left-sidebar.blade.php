<div class="left-sidebar show" style="background-color: #f8f9fb;">
    <!-- LOGO -->
    <div class="brand">
        <a href="index.html" class="logo">
            <span>
                <img src="{{ asset('admin-assets/images/logos/logoo.svg') }}" alt="Georgia construction co." class="logo-sm">
            </span>
            <!-- <span>
                <img src="{{ asset('admin-assets/images/logo.png') }}" alt="logo-large" class="logo-lg logo-light">
                <img src="{{ asset('admin-assets/images/logo-dark.png') }}" alt="logo-large" class="logo-lg logo-dark">
            </span> -->
        </a>
    </div>
    <!--end logo-->
    <div class="menu-content h-100" data-simplebar>
        <div class="menu-body navbar-vertical tab-content">
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="menu-label mt-0">M<span>ain</span></li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.dashboard') }}"><i class="ti ti-home menu-icon"></i><span>Dashboard</span></a>
                    </li><!--end nav-item-->
                    <li class="menu-label mt-0">A<span>pp Section</span></li>
                    <li class="nav-item">
                        <a 
                            class="nav-link" 
                            href="#sidebarCategories" 
                            data-bs-toggle="collapse" 
                            role="button"
                            aria-expanded="false" 
                            aria-controls="sidebarCategories"
                        >
                            <i class="ti ti-file-diff menu-icon"></i>
                            <span>Categories</span>
                        </a>
                        <div class="collapse" id="sidebarCategories">
                            <ul class="nav flex-column">
                               <li class="nav-item">
                                    <a class="nav-link" href="{{ route('categories.index') }}">Categories List</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('categories.create') }}">New Category</a>
                                </li><!--end nav-item-->
                            </ul><!--end nav-->
                        </div><!--end sidebarPages-->
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a 
                            class="nav-link" 
                            href="#sidebarProjects" 
                            data-bs-toggle="collapse" 
                            role="button"
                            aria-expanded="false" 
                            aria-controls="sidebarProjects"
                        >
                            <i class="ti ti-file-diff menu-icon"></i>
                            <span>Projects</span>
                        </a>
                        <div class="collapse" id="sidebarProjects">
                            <ul class="nav flex-column">
                               <li class="nav-item">
                                    <a class="nav-link" href="{{ route('projects.index') }}">Projects List</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('projects.create') }}">New Project</a>
                                </li><!--end nav-item-->
                            </ul><!--end nav-->
                        </div><!--end sidebarPages-->
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a 
                            class="nav-link" 
                            href="#sidebarServices" 
                            data-bs-toggle="collapse" 
                            role="button"
                            aria-expanded="false" 
                            aria-controls="sidebarServices"
                        >
                            <i class="ti ti-file-diff menu-icon"></i>
                            <span>Services</span>
                        </a>
                        <div class="collapse" id="sidebarServices">
                            <ul class="nav flex-column">
                               <li class="nav-item">
                                    <a class="nav-link" href="{{ route('services.index') }}">Services List</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('services.create') }}">New Service</a>
                                </li><!--end nav-item-->
                            </ul><!--end nav-->
                        </div><!--end sidebarPages-->
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a 
                            class="nav-link" 
                            href="#sidebarAdmins" 
                            data-bs-toggle="collapse" 
                            role="button"
                            aria-expanded="false" 
                            aria-controls="sidebarAdmins"
                        >
                            <i class="ti ti-file-diff menu-icon"></i>
                            <span>Admins</span>
                        </a>
                        <div class="collapse" id="sidebarAdmins">
                            <ul class="nav flex-column">
                               <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admins.index') }}">Admins List</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admins.create') }}">New Admin</a>
                                </li><!--end nav-item-->
                            </ul><!--end nav-->
                        </div><!--end sidebarPages-->
                    </li><!--end nav-item-->
                    <li class="menu-label mt-0">S<span>ettings Section</span></li>
                    <li class="nav-item">
                        <a 
                            class="nav-link" 
                            href="#sidebarMetaTag" 
                            data-bs-toggle="collapse" 
                            role="button"
                            aria-expanded="false" 
                            aria-controls="sidebarMetaTag"
                        >
                            <i class="ti ti-file-diff menu-icon"></i>
                            <span>Meta Tags</span>
                        </a>
                        <div class="collapse" id="sidebarMetaTag">
                            <ul class="nav flex-column">
                               <li class="nav-item">
                                    <a class="nav-link" href="{{ route('metatags.index') }}">Meta Tags List</a>
                                </li><!--end nav-item-->
                            </ul><!--end nav-->
                        </div><!--end sidebarPages-->
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a 
                            class="nav-link" 
                            href="#"
                            onclick="
                                event.preventDefault(); 
                                document.getElementById('admin-logout-form-side').submit();
                            "
                        >
                            <i class="ti ti-shield-lock menu-icon"></i>
                            <span>Logout</span>
                        </a>
                    </li><!--end nav-item-->
                </ul><!--end navbar-nav--->
            </div><!--end sidebarCollapse-->
            <form id="admin-logout-form-side" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>    
</div>
<!-- end left-sidenav-->