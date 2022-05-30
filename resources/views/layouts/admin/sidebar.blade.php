<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">SIPESDA</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Route::is('home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Penduduk dan User
    </div>

    <!-- Nav Item - Admin -->
    @if(auth()->user()->role == 'super_admin')
        <li class="nav-item {{ Route::is('admin.*') ? 'active' : '' }}">
            <a class="nav-link collapsed {{ Route::is('admin.*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#admin"
                aria-expanded="true" aria-controls="admin">
                <i class="fas fa-fw fa-user"></i>
                <span>Admin</span>
            </a>
            <div id="admin" class="collapse {{ Route::is('admin.*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ Route::is('admin.index') ? 'active' : '' }}" href="{{ route('admin.index') }}">List Admin</a>
                    <a class="collapse-item {{ Route::is('admin.create') ? 'active' : '' }}" href="{{ route('admin.create') }}">Tambah Admin</a>
                </div>
            </div>
        </li>
    @endif

    <!-- Nav Item - Masyarakat -->
    @if(auth()->user()->role == 'super_admin' or auth()->user()->role == 'admin')
        <li class="nav-item {{ Route::is('masyarakat.*') ? 'active' : '' }}">
            <a class="nav-link collapsed {{ Route::is('masyarakat.*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#masyarakat"
                aria-expanded="true" aria-controls="masyarakat">
                <i class="fas fa-fw fa-users"></i>
                <span>Masyarakat</span>
            </a>
            <div id="masyarakat" class="collapse {{ Route::is('masyarakat.*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ Route::is('masyarakat.index') ? 'active' : '' }}" href="{{ route('masyarakat.index') }}">List Masyarakat</a>
                    <a class="collapse-item {{ Route::is('masyarakat.create') ? 'active' : '' }}" href="{{ route('masyarakat.create') }}">Tambah Masyarakat</a>
                </div>
            </div>
        </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    
    <!-- Heading -->
    <div class="sidebar-heading">
        Pelayanan Surat Keterangan
    </div>
    <li class="nav-item {{ Route::is('domisili.*') ? 'active' : '' }}">
        <a class="nav-link collapsed {{ Route::is('domisili.*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#domisili"
            aria-expanded="true" aria-controls="domisili">
            <i class="fas fa-fw fa-map-marker-alt"></i>
            <span>Domisili</span>
        </a>
        <div id="domisili" class="collapse {{ Route::is('domisili.*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Route::is('domisili.index') ? 'active' : '' }}" href="{{ route('domisili.index') }}">List Domisili</a>
                <a class="collapse-item {{ Route::is('domisili.create') ? 'active' : '' }}" href="{{ route('domisili.create') }}">Tambah Domisili</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>