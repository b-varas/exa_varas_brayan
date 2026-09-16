<div class="startbar d-print-none">
    <!--start brand-->
    <div class="brand">
        <a href="{{ route('any', 'index')}}" class="logo">
            <span>
                <img src="/images/logo-sm.png" alt="logo-small" class="logo-sm">
            </span>
            <span class="">
                <img src="/images/logo-light.png" alt="logo-large" class="logo-lg logo-light">
                <img src="/images/logo-dark.png" alt="logo-large" class="logo-lg logo-dark">
            </span>
        </a>
    </div>
    <!--end brand-->
    <!--start startbar-menu-->
    <div class="startbar-menu">
        <div class="startbar-collapse" id="startbarCollapse" data-simplebar>
            <ul class="navbar-nav mb-auto w-100">
                <li class="menu-label mt-2">
                    <span>Main</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="iconoir-report-columns menu-icon"></i>
                        <span>Dashboard</span>
                    </a>
                </li><!--end nav-item-->

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('usuarios.index') }}">
                        <i class="iconoir-group menu-icon"></i>
                        <span>Usuarios</span>
                    </a>
                </li><!--end nav-item-->

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('productos.index') }}">
                        <i class="iconoir-shopping-bag menu-icon"></i>
                        <span>Productos</span>
                    </a>
                </li><!--end nav-item-->

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('clientes.index') }}">
                        <i class="iconoir-building menu-icon"></i>
                        <span>Clientes</span>
                    </a>
                </li><!--end nav-item-->
            </ul><!--end navbar-nav--->
            <div class="update-msg text-center">
                <div class="d-flex justify-content-center align-items-center thumb-lg update-icon-box  rounded-circle mx-auto">
                    <!-- <i class="iconoir-peace-hand h3 align-self-center mb-0 text-primary"></i> -->
                    <img src="/images/extra/gold.png" alt="" class="" height="45">
                </div>
                <h5 class="mt-3">Today's <span class="text-white">$2450.00</span></h5>
                <p class="mb-3 text-muted">Today's best Investment for you.</p>
                <a href="javascript: void(0);" class="btn text-primary shadow-sm rounded-pill px-3">Invest Now</a>
            </div>
        </div>
    </div><!--end startbar-collapse-->
</div><!--end startbar-menu-->
</div><!--end startbar-->
<div class="startbar-overlay d-print-none"></div>