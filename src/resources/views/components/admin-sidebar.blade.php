<!-- resources/views/layouts/partials/admin_sidebar.blade.php -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand -->
    <a href="{{ route('admin.dashboard', ['locale' => app()->getLocale()]) }}" class="brand-link">
        <span class="brand-text font-weight-light">Panel Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- User Panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
            </div>
        </div>

        <!-- Language Switch -->
        <x-language-switcher class="px-3" />

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.manage.dashboard', ['locale' => app()->getLocale()]) }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @if(Auth::guard('admin')->user()->superadmin)
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard.list.users', ['locale' => app()->getLocale()]) }}" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Usuarios</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard.list.admins', ['locale' => app()->getLocale()]) }}" class="nav-link">
                            <i class="nav-icon fas fa-user-shield"></i>
                            <p>Admins</p>
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a href="{{ route('admin.manage.tickets', ['locale' => app()->getLocale()]) }}" class="nav-link">
                        <i class="nav-icon fas fa-ticket-alt"></i>
                        <p>Tickets</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.notifications', ['locale' => app()->getLocale()]) }}" class="nav-link">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>
                            Notificaciones
                            @php $count = Auth::user()->unreadNotifications->count(); @endphp
                            @if ($count > 0)
                                <span class="right badge badge-danger">{{ $count }}</span>
                            @endif
                        </p>
                    </a>
                </li>

                <!-- Logout -->
                <li class="nav-item">
                    <form method="POST" action="{{ route('admin.logout', ['locale' => app()->getLocale()]) }}">
                        @csrf
                        <button class="nav-link btn btn-link text-left text-white">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Cerrar sesión</p>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
