<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-text mx-3"><sup>Admin </sup>interface</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item -->
    <li class="nav-item
        {{ (Route::currentRouteName() == 'admin.home'
        || Route::currentRouteName() == 'home' )
        ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i><span>Home</span>
        </a>
    </li>

    <li class="nav-item {{ (Route::currentRouteName() == 'admin.companyCategories') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.companyCategories') }}">
            <i class="fas fa-fw fa-hippo"></i><span>Company Categories</span>
        </a>
    </li>

    <li class="nav-item {{ (Route::currentRouteName() == 'admin.companies') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.companies') }}">
            <i class="fas fa-fw fa-building"></i><span>Companies</span>
        </a>
    </li>

    <li class="nav-item {{ (Route::currentRouteName() == 'admin.companyBranches') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.companyBranches') }}">
            <i class="fas fa-fw fa-rocket"></i><span>Company Branches </span>
        </a>
    </li>

    <li class="nav-item {{ (Route::currentRouteName() == 'admin.users') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.users') }}">
            <i class="fas fa-fw fa-user"></i><span>Users</span>
        </a>
    </li>

    <li class="nav-item {{ (Route::currentRouteName() == 'admin.receptionists') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.receptionists') }}">
            <i class="fas fa-fw fa-user"></i><span>Receptionists</span>
        </a>
    </li>

    <li class="nav-item {{ (Route::currentRouteName() == 'admin.admins') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.admins') }}">
            <i class="fas fa-fw fa-user"></i><span>Admins</span>
        </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="{{  asset('sb-theme/img/undraw_rocket.svg') }}" alt="...">
        <p class="text-center mb-2"><strong>Michu Werefa</strong> mobile app is coming soon...</p>
        <a class="btn btn-success btn-sm" href="{{ route('home') }}">View Website</a>
    </div>

</ul>
