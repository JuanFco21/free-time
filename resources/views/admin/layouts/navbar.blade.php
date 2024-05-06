<nav class="navbar navbar-expand-lg main-navbar">
    <div class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img class="rounded-circle mr-1" width="35" height="35"
                    src="{{ !empty(Auth::guard('admin')->user()->image) ? asset('storage/users-img/' . Auth::guard('admin')->user()->image) : asset('storage/users-img/avatar-5.png') }}"
                    alt="Imagen de usuario">
                <div class="d-sm-none d-lg-inline-block">
                    {{ Auth::guard('admin')->user()->name }}
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                </a>
            </div>
        </li>
    </ul>
</nav>
