<div class="left-sidebar show" style="background-color: #f8f9fb;">
    <!-- LOGO -->
    <div class="brand">
        <a href="{{ route('admin.dashboard') }}" class="logo">
            <span>
                <img src="{{ asset('admin-assets/images/logos/logoo.svg') }}" alt="Georgia construction co." class="logo-sm">
            </span>
        </a>
    </div>
    <!--end logo-->
    <div class="menu-content h-100" data-simplebar>
        <div class="menu-body navbar-vertical tab-content">
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="menu-label mt-0">H<span>ome</span></li>
                    <li class="nav-item">
                        <a 
                            class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" 
                            href="{{ route('admin.dashboard') }}"
                        >
                            <i class="ti ti-home menu-icon"></i>
                            <span>Dashboard</span>
                        </a>
                    </li><!--end nav-item-->
                    <li class="menu-label mt-0">A<span>pp Section</span></li>
                    <li class="nav-item">
                        <a 
                            class="nav-link {{ request()->routeIs('sliders.index') || request()->routeIs('sliders.edit') || request()->routeIs('sliders.create')  ? 'active' : '' }}" 
                            href="#sidebarSliders" 
                            data-bs-toggle="collapse" 
                            role="button"
                            aria-expanded="false" 
                            aria-controls="sidebarSliders"
                        >
                            <i class="ti ti-slideshow menu-icon"></i>
                            <span>Sliders</span>
                        </a>
                        <div class="collapse {{ request()->routeIs('sliders.index') || request()->routeIs('sliders.edit') || request()->routeIs('sliders.create') ? 'show' : '' }}" id="sidebarSliders">
                            <ul class="nav flex-column">
                               <li class="nav-item">
                                    <a 
                                        class="nav-link {{ request()->routeIs('sliders.index') || request()->routeIs('sliders.edit') ? 'active' : '' }}" 
                                        href="{{ route('sliders.index') }}"
                                    >
                                        Sliders
                                    </a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a 
                                        class="nav-link {{ request()->routeIs('sliders.create') ? 'active' : '' }}" 
                                        href="{{ route('sliders.create') }}"
                                    >
                                        New Slider
                                    </a>
                                </li><!--end nav-item-->
                            </ul><!--end nav-->
                        </div><!--end sidebarPages-->
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a 
                            class="nav-link {{ request()->routeIs('categories.index') || request()->routeIs('categories.edit') || request()->routeIs('categories.create')  ? 'active' : '' }}" 
                            href="#sidebarCategories" 
                            data-bs-toggle="collapse" 
                            role="button"
                            aria-expanded="false" 
                            aria-controls="sidebarCategories"
                        >
                            <i class="ti ti-layout-grid menu-icon"></i>
                            <span>Categories</span>
                        </a>
                        <div class="collapse {{ request()->routeIs('categories.index') || request()->routeIs('categories.edit') || request()->routeIs('categories.create') ? 'show' : '' }}" id="sidebarCategories">
                            <ul class="nav flex-column">
                               <li class="nav-item">
                                    <a 
                                        class="nav-link {{ request()->routeIs('categories.index') || request()->routeIs('categories.edit') ? 'active' : '' }}" 
                                        href="{{ route('categories.index') }}"
                                    >
                                        Categories List
                                    </a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a 
                                        class="nav-link {{ request()->routeIs('categories.create') ? 'active' : '' }}" 
                                        href="{{ route('categories.create') }}"
                                    >
                                        New Category
                                    </a>
                                </li><!--end nav-item-->
                            </ul><!--end nav-->
                        </div><!--end sidebarPages-->
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a 
                            class="nav-link {{ request()->routeIs('projects.index') || request()->routeIs('projects.edit') || request()->routeIs('projects.create') ? 'active' : '' }}" 
                            href="#sidebarProjects" 
                            data-bs-toggle="collapse" 
                            role="button"
                            aria-expanded="false" 
                            aria-controls="sidebarProjects"
                        >
                            <i class="ti ti-backhoe menu-icon"></i>
                            <span>Projects</span>
                        </a>
                        <div class="collapse {{ request()->routeIs('projects.index') || request()->routeIs('projects.edit') || request()->routeIs('projects.create') ? 'show' : '' }}" id="sidebarProjects">
                            <ul class="nav flex-column">
                               <li class="nav-item">
                                    <a 
                                        class="nav-link {{ request()->routeIs('projects.index') || request()->routeIs('projects.edit') ? 'active' : '' }}" 
                                        href="{{ route('projects.index') }}"
                                    >
                                        Projects List
                                    </a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a 
                                        class="nav-link {{ request()->routeIs('projects.create') ? 'active' : '' }}" 
                                        href="{{ route('projects.create') }}"
                                    >
                                        New Project
                                    </a>
                                </li><!--end nav-item-->
                            </ul><!--end nav-->
                        </div><!--end sidebarPages-->
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a 
                            class="nav-link {{ request()->routeIs('services.index') || request()->routeIs('services.edit') || request()->routeIs('services.create') ? 'active' : '' }}" 
                            href="#sidebarServices" 
                            data-bs-toggle="collapse" 
                            role="button"
                            aria-expanded="false" 
                            aria-controls="sidebarServices"
                        >
                            <i class="ti ti-settings-automation menu-icon"></i>
                            <span>Services</span>
                        </a>
                        <div class="collapse {{ request()->routeIs('services.index') || request()->routeIs('services.edit') || request()->routeIs('services.create') ? 'show' : '' }}" id="sidebarServices">
                            <ul class="nav flex-column">
                               <li class="nav-item">
                                    <a 
                                        class="nav-link {{ request()->routeIs('services.index') || request()->routeIs('services.edit') ? 'active' : '' }}" 
                                        href="{{ route('services.index') }}"
                                    >
                                        Services List
                                    </a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a 
                                        class="nav-link {{ request()->routeIs('services.create') ? 'active' : '' }}" 
                                        href="{{ route('services.create') }}"
                                    >
                                        New Service
                                    </a>
                                </li><!--end nav-item-->
                            </ul><!--end nav-->
                        </div><!--end sidebarPages-->
                    </li><!--end nav-item-->
                    <?php
                        use App\Models\Contact;
                        $unreadMsgs = Contact::unread()->count();
                    ?>
                    <li class="nav-item">
                        <a 
                            class="nav-link {{ request()->routeIs('inbox.index') || request()->routeIs('inbox.show') ? 'active' : '' }}" 
                            href="#sidebarInbox" 
                            data-bs-toggle="collapse" 
                            role="button"
                            aria-expanded="false" 
                            aria-controls="sidebarInbox"
                        >
                            <i class="ti ti-inbox menu-icon"></i>
                            <span>Inbox</span>
                            <span class="ms-1 text-danger">({{ $unreadMsgs }})</span>
                        </a>
                        <div class="collapse {{ request()->routeIs('inbox.index') || request()->routeIs('inbox.show') ? 'show' : '' }}" id="sidebarInbox">
                            <ul class="nav flex-column">
                               <li class="nav-item">
                                    <a 
                                        class="nav-link {{ request()->routeIs('inbox.index') || request()->routeIs('inbox.show') ? 'active' : '' }}" 
                                        href="{{ route('inbox.index') }}"
                                    >
                                        Inbox 
                                    </a>
                                </li><!--end nav-item-->
                            </ul><!--end nav-->
                        </div><!--end sidebarPages-->
                    </li><!--end nav-item-->
                    <li class="menu-label mt-0">S<span>ettings Section</span></li>
                    <li class="nav-item">
                        <a 
                            class="nav-link {{ request()->routeIs('metatags.index') || request()->routeIs('metatags.edit') ? 'active' : '' }}" 
                            href="#sidebarMetaTag" 
                            data-bs-toggle="collapse" 
                            role="button"
                            aria-expanded="false" 
                            aria-controls="sidebarMetaTag"
                        >
                            <i class="ti ti-search menu-icon"></i>
                            <span>Meta Tags</span>
                        </a>
                        <div class="collapse {{ request()->routeIs('metatags.index') || request()->routeIs('metatags.edit') ? 'show' : '' }}" id="sidebarMetaTag">
                            <ul class="nav flex-column">
                               <li class="nav-item">
                                    <a 
                                        class="nav-link {{ request()->routeIs('metatags.index') || request()->routeIs('metatags.edit') ? 'active' : '' }}" 
                                        href="{{ route('metatags.index') }}"
                                    >
                                        Meta Tags List
                                    </a>
                                </li><!--end nav-item-->
                            </ul><!--end nav-->
                        </div><!--end sidebarPages-->
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a 
                            class="nav-link {{ request()->routeIs('admins.create') || request()->routeIs('admins.index') || request()->routeIs('admins.edit') ? 'active' : '' }}" 
                            href="#sidebarAdmins" 
                            data-bs-toggle="collapse" 
                            role="button"
                            aria-expanded="false" 
                            aria-controls="sidebarAdmins"
                        >
                            <i class="ti ti-user menu-icon"></i>
                            <span>Admins</span>
                        </a>
                        <div class="collapse {{ request()->routeIs('admins.create') || request()->routeIs('admins.index') || request()->routeIs('admins.edit') ? 'show' : '' }}" id="sidebarAdmins">
                            <ul class="nav flex-column">
                               <li class="nav-item">
                                    <a 
                                        class="nav-link {{ request()->routeIs('admins.index') || request()->routeIs('admins.edit') ? 'active' : '' }}" 
                                        href="{{ route('admins.index') }}"
                                    >
                                        Admins List
                                    </a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a 
                                        class="nav-link {{ request()->routeIs('admins.create') ? 'active' : '' }}" 
                                        href="{{ route('admins.create') }}"
                                    >
                                        New Admin
                                    </a>
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
                            <i class="ti ti-logout menu-icon"></i>
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