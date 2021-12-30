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

    <li class="nav-item {{ Request::is('administrator/usuarios') || Request::is('administrator/usuarios/*') ? 'active' : '' }}"  >
        <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseUsuarios"
            aria-expanded="true" aria-controls="collapseUsuarios">
            <i class="fas fa-user"></i>
            <span>Usuarios</span>
        </a>
        <div id="collapseUsuarios" class="collapse {{ Request::is('administrator/usuarios') || Request::is('administrator/usuarios/*') ? 'show' : '' }}" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Usuarios:</h6>
                <a class="collapse-item" href="#">Ver Categorias</a>
                <a class="collapse-item {{ Request::is('administrator/usuarios/cliente') || Request::is('administrator/usuarios/cliente/*') ? 'active' : '' }}" href="{{ route('cliente.index') }}">Ver Clientes</a>
            </div>
        </div>
    </li>
    <li class="nav-item {{ Request::is('administrator/servicios') || Request::is('administrator/servicios/*') ? 'active' : '' }}"  >
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseServicios"
            aria-expanded="true" aria-controls="collapseServicios">
            {{-- <i class="fas fa-sliders-h"></i> --}}
            <i class="fas fa-store-alt"></i>
            <span>Servicios</span>
        </a>
        <div id="collapseServicios"  class="collapse  {{ Request::is('administrator/servicios') || Request::is('administrator/servicios/*') ? 'show' : '' }}" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Servicios:</h6>
                <a class="collapse-item " href="#">Ver Categorias</a>
                <a class="collapse-item {{ Request::is('administrator/servicios/area') || Request::is('administrator/servicios/area/*') ? 'active' : '' }} " href="{{ route('areas.index') }}">Ver areas</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Opciones
    </div>

    <li class="nav-item {{ Request::is('administrator/ajustes') || Request::is('administrator/ajustes/*') ? 'active' : '' }}"  >
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAjustes"
            aria-expanded="true" aria-controls="collapseAjustes">
            <i class="fas fa-sliders-h"></i>
            <span>Ajustes</span>
        </a>
        <div id="collapseAjustes"  class="collapse  {{ Request::is('administrator/ajustes') || Request::is('administrator/ajustes/*') ? 'show' : '' }}" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Ajustes:</h6>
                <a class="collapse-item " href="#">Permisos</a>
                <a class="collapse-item " href="#">Manterimiento</a>
                <a class="collapse-item " href="#">Ayuda</a>
                <a class="collapse-item " href="#">Ajustes Generales</a>
            </div>
        </div>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="{{ route('logOut') }}">
            <i class="fas fa-sign-out-alt"></i>
            <span>Log out</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
