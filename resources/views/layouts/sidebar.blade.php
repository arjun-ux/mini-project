<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-water"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Toko Mama</div>
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
    @if(Auth::user()->Roles->name === 'superadmin')
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kandang"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-phoenix-framework"></i>
                <span>Kandang</span>
            </a>
            <div id="kandang" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('kandang.index') }}">Daftar Kandang</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kambing"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-linux"></i>
                <span>Kambing</span>
            </a>
            <div id="kambing" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('kambing.index') }}">Daftar Kambing</a>
                </div>
            </div>
        </li>
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#inventoryUtil"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-users"></i>
                <span>Users</span>
            </a>
            <div id="inventoryUtil" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('user.index') }}">Daftar User</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#salesUtil"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-circle"></i>
                <span>Role Manajemen</span>
            </a>
            <div id="salesUtil" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('role.index') }}">List</a>
                </div>
            </div>
        </li>

    @elseif(Auth::user()->Roles->name === 'peternak')
    <!-- Heading -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kandang"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-phoenix-framework"></i>
                <span>Kandang</span>
            </a>
            <div id="kandang" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="#">Daftar User</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kambing"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-linux"></i>
                <span>Kambing</span>
            </a>
            <div id="kambing" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="#">Daftar User</a>
                </div>
            </div>
        </li>
    @elseif(Auth::user()->Roles->name === 'manager')
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#salesUtil"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-circle"></i>
                <span>Role Manajemen</span>
            </a>
            <div id="salesUtil" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('role.index') }}">List</a>
                </div>
            </div>
        </li>
    @elseif(Auth::user()->Roles->name === 'staff')
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#salesUtil"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-circle"></i>
                <span>Role Manajemen</span>
            </a>
            <div id="salesUtil" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('role.index') }}">List</a>
                </div>
            </div>
        </li>

    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
