<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href={{ url('/') }}>
        <div class="sidebar-brand-icon">
            <i class="fa-regular fa-newspaper"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Tomorrow</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ str_contains(Route::currentRouteName(),'dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Elementi
    </div>

    <li class="nav-item {{ str_contains(Route::currentRouteName(),'projects') ? 'active' : '' }}">
        <a class="nav-link" role="button" href="{{ route('admin.projects.index') }}">
            <i class="fa-solid fa-note-sticky"></i>
            <span>Progetti</span>
        </a>
    </li>

    <li class="nav-item {{ str_contains(Route::currentRouteName(),'categories') ? 'active' : '' }}">
        <a class="nav-link" role="button" href="{{ route('admin.categories.index') }}">
            <i class="fa-solid fa-note-sticky"></i>
            <span>Categorie</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    {{-- <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!
        </p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div> --}}

</ul>
<!-- End of Sidebar -->
