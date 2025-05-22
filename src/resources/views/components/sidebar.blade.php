<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand -->
    <a href="{{ route('user.dashboard', ['locale' => app()->getLocale()]) }}" class="brand-link text-center">
        <span class="brand-text font-weight-light">Gestor de Tickets</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Opcional: Usuario autenticado -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">  
            <div class="info">
                <a href="{{ route('user.show.profile', ['locale' => app()->getLocale()]) }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Menú lateral -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview" role="menu" data-accordion="false">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('user.dashboard', ['locale' => app()->getLocale()]) }}"
                       class="nav-link {{ Route::is('user.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Tickets (agrupados en treeview) -->
                <li class="nav-item has-treeview {{ Route::is('user.tickets.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::is('user.tickets.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-ticket-alt"></i>
                        <p>
                            Tickets
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.tickets.index', ['locale' => app()->getLocale()]) }}"
                               class="nav-link {{ Route::is('user.tickets.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                {{ __('frontoffice.tickets.ticket_list') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.tickets.create', ['locale' => app()->getLocale()]) }}"
                               class="nav-link {{ Route::is('user.tickets.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                {{ __('frontoffice.tickets.create_button') }}
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Notificaciones -->
                <li class="nav-item">
                    <a href="{{ route('user.notifications', ['locale' => app()->getLocale()]) }}"
                       class="nav-link {{ Route::is('user.notifications') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>Notificaciones</p>
                    </a>
                </li>

                <!-- Ayuda -->


                <!-- Cerrar sesión -->
                <li class="nav-item">
                    <a href="#" class="nav-link"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Cerrar Sesión</p>
                    </a>
                    <form id="logout-form"
                          action="{{ route('user.logout', ['locale' => app()->getLocale()]) }}"
                          method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
