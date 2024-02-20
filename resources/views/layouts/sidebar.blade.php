<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-10">
        <!-- Replace the smiley face with your business logo -->
          <img src="{{ url('admin_assets/img/tienda.png') }}" alt="Business Logo">
      </div>
      <div class="sidebar-brand-text mx-3">Ferreteria<sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Usuarios</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('cliente') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Clientes</span></a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('categoria') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Categorias</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('producto') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Producto</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('proveedor') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Proveedores</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('venta.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Ventas</span></a>
    </li>

     <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Realizar Compra</span></a>


        <li class="nav-item">
          <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Reporte</span></a>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


  </ul>
