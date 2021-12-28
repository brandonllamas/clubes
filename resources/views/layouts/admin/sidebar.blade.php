<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }} </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Modulos
    </div>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('cliente.index') }}">
            <i class="fas fa-user"></i>
            <span>Clientes</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseServicios"
            aria-expanded="true" aria-controls="collapseServicios">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Servicios</span>
        </a>
        <div id="collapseServicios" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Servicios:</h6>
                <a class="collapse-item" href="utilities-color.html">Ver servicios</a>
                <a class="collapse-item" href="utilities-border.html">Ver areas</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Opciones
    </div>
    <li class="nav-item active">
        <a class="nav-link" href="#">
            <i class="fas fa-map-marked-alt"></i>
            <span>Permisos</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="#">
            <i class="fas fa-map-marked-alt"></i>
            <span>Soporte</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="#">
            <i class="fas fa-map-marked-alt"></i>
            <span>Manterimiento</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="#">
            <i class="fas fa-map-marked-alt"></i>
            <span>Ayuda</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('logOut') }}">
            <i class="fas fa-sign-out-alt"></i>
            <span>Log out</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
