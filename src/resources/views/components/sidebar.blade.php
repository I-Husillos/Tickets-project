<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <!-- Titulo de la aplicacion -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <div class="info">
                                <a href="#" class="brand-image-xs logo-xl">Gestor de Tickets</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.dashboard', ['locale' => app()->getLocale()]) }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('user.tickets.index', ['locale' => app()->getLocale()]) }}" class="nav-link">
                        <i class="nav-icon fas fa-ticket-alt"></i>
                        <p>Mis Tickets</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('user.tickets.create', ['locale' => app()->getLocale()]) }}" class="nav-link">
                        <i class="nav-icon fas fa-plus-circle"></i>
                        <p>Crear Ticket</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('user.notifications', ['locale' => app()->getLocale()]) }}" class="nav-link">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>Notificaciones</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Cerrar Sesión</p>
                    </a>

                    <form id="logout-form" action="{{ route('user.logout', ['locale' => app()->getLocale()]) }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>

