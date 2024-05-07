<div class="navbar-bg"></div>

@include('admin.layouts.navbar')

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">FREE TIME</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">FT</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-home"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class=active><a class="nav-link" href="{{ route('dashboard') }}">General Dashboard</a></li>
                </ul>
            </li>
            <li class="menu-header">Módulo de Catálogos</li>
            @if (Auth::guard('admin')->check() &&
                    Auth::guard('admin')->user()->can('category.index'))
                <li>
                    <a class="nav-link" href="{{ route('category.index') }}"><i class="fas fa-book"></i>
                        <span>Categorias</span>
                    </a>
                </li>
                <li class="menu-header">Módulo de Usuarios</li>
                @if (Auth::guard('admin')->check() &&
                        Auth::guard('admin')->user()->can('users.index'))
                    <li>
                        <a class="nav-link" href="{{ route('administrator.index') }}"><i class="fas fa-users"></i>
                            <span>Administradores</span>
                        </a>
                    </li>
                @endif
                @if (Auth::guard('admin')->check() &&
                        Auth::guard('admin')->user()->can('roles.index'))
                    <li>
                        <a class="nav-link" href="{{ route('role.index') }}"><i class="fas fa-pencil-ruler"></i>
                            <span>Roles</span>
                        </a>
                    </li>
                @endif
                @if (Auth::guard('admin')->check() &&
                        Auth::guard('admin')->user()->can('permisos.index'))
                    <li>
                        <a class="nav-link" href="{{ route('permission.index') }}"><i class="fas fa-lock"></i>
                            <span>Permisos</span>
                        </a>
                    </li>
                @endif
                <li class="menu-header">Módulo de Publicaciones</li>
                @if (Auth::guard('admin')->check() &&
                        Auth::guard('admin')->user()->can('digital_library.index'))
                    <li>
                        <a class="nav-link" href="{{ route('digital_library.index') }}"><i class="fas fa-bookmark"></i>
                            <span>Biblioteca Digital</span>
                        </a>
                    </li>
                @endif
            @endif
        </ul>
    </aside>
</div>
