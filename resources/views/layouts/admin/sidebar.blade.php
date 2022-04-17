<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">SIPESDA</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
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
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admin"
                aria-expanded="true" aria-controls="admin">
                <i class="fas fa-fw fa-user"></i>
                <span>Admin</span>
            </a>
            <div id="admin" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="#">Daftar Admin</a>
                    <a class="collapse-item" href="#">Tambah Admin</a>
                </div>
            </div>
        </li>
    @endif

    <!-- Nav Item - Penduduk -->
    @if(auth()->user()->role == 'super_admin' or auth()->user()->role == 'admin')
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#penduduk"
                aria-expanded="true" aria-controls="penduduk">
                <i class="fas fa-fw fa-users"></i>
                <span>Penduduk</span>
            </a>
            <div id="penduduk" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="#">Daftar Penduduk</a>
                    <a class="collapse-item" href="#">Tambah Penduduk</a>
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

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#domisili"
            aria-expanded="true" aria-controls="domisili">
            <i class="fas fa-fw fa-map-marker-alt"></i>
            <span>Domisili</span>
        </a>
        <div id="domisili" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">Daftar Surat</a>
                <a class="collapse-item" href="#">Tambah Surat</a>
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