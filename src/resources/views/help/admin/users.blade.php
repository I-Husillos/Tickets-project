@extends('layouts.admin')

@section('title', 'Manual Operativo · Gestión de Usuarios')

@section('admincontent')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="text-dark border-bottom pb-2">3. Administración de Identidad y Accesos (IAM)</h1>
            <p class="text-muted lead">Control de cuentas de usuario, roles y permisos de acceso al sistema.</p>
        </div>
    </div>

    <div class="row">
        {{-- COLUMNA IZQUIERDA: CONTENIDO --}}
        <div class="col-lg-9">

            {{-- SECCIÓN 3.1: ROLES --}}
            <div class="mb-5">
                <h3 class="text-primary mb-3">3.1. Tipología de Cuentas</h3>
                <p>
                    El sistema distingue estrictamente entre dos tipos de actores por razones de seguridad y operatividad.
                    Ambos tienen accesos y portales diferenciados.
                </p>
                
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card h-100 border-primary mb-3" style="border-top-width: 4px;">
                            <div class="card-body">
                                <h5 class="card-title text-primary font-weight-bold mb-3">
                                    <i class="fas fa-user mr-2"></i>Usuario Final (Client)
                                </h5>
                                <p class="card-text">
                                    Son los empleados o clientes que requieren asistencia técnica.
                                </p>
                                <ul class="small text-muted">
                                    <li>Acceso: Portal de Usuario (User Portal).</li>
                                    <li>Permisos: Crear tickets, ver sus propios tickets.</li>
                                    <li>Gestión: Puede ser editado por cualquier Admin.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 border-danger mb-3" style="border-top-width: 4px;">
                            <div class="card-body">
                                <h5 class="card-title text-danger font-weight-bold mb-3">
                                    <i class="fas fa-user-shield mr-2"></i>Administrador (Staff)
                                </h5>
                                <p class="card-text">
                                    Personal técnico encargado de resolver incidencias.
                                </p>
                                <ul class="small text-muted">
                                    <li>Acceso: Panel de Administración (Backoffice).</li>
                                    <li>Permisos: Ver todos los tickets, gestionar configuración.</li>
                                    <li>Gestión: Solo Superadmins pueden crear Staff.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SECCIÓN 3.2: GESTIÓN DE USUARIOS --}}
            <div class="mb-5">
                <h3 class="text-primary mb-3">3.2. Gestión de Usuarios Finales</h3>
                <p>
                    Como administrador, es posible que necesite dar de alta cuentas manualmente si el auto-registro no está habilitado, 
                    o resetear contraseñas de usuarios que han perdido el acceso.
                </p>

                <div class="card bg-light border-0">
                    <div class="card-body">
                        <h5 class="text-dark"><i class="fas fa-plus-circle text-success mr-2"></i>Alta de Nuevo Usuario</h5>
                        <p>Para registrar un empleado manualmente:</p>
                        <ol>
                            <li>Navegue a <strong>Usuarios > Crear Nuevo</strong>.</li>
                            <li>Complete los campos obligatorios: Nombre completo y Correo electrónico corporativo.</li>
                            <li>Establezca una contraseña temporal segura.</li>
                            <li>Comunique las credenciales al usuario (el sistema no envía la contraseña por email por seguridad).</li>
                        </ol>
                        <div class="text-center mt-3">
                             <img src="/img/image%20copy%208.png" class="img-fluid border shadow-sm rounded w-75" alt="Formulario Usuario">
                             <p class="small text-muted mt-1 font-italic">Figura 3.1: Formulario de alta.</p>
                        </div>
                    </div>
                </div>
                
                <h5 class="mt-4 text-dark"><i class="fas fa-key text-warning mr-2"></i>Restablecimiento de Contraseñas</h5>
                <p>Para resetear un acceso:</p>
                <ul>
                     <li>Edite el usuario deseado.</li>
                     <li>Escriba una nueva contraseña en el campo "Contraseña". <strong>Nota:</strong> Si deja este campo en blanco, la clave actual se mantiene.</li>
                </ul>
            </div>

            {{-- SECCIÓN 3.3: PRIVILEGIOS DE SUPERADMIN --}}
            @if(Auth::guard('admin')->user()->superadmin)
            <div class="mb-5">
                <h3 class="text-danger mb-3">3.3. Gestión de Staff (Superadmin)</h3>
                <div class="alert alert-warning border">
                    <i class="fas fa-exclamation-triangle mr-2"></i> Esta sección solo es visible para usted porque tiene privilegios elevados.
                </div>
                <p>
                    Usted tiene capacidad para gestionar el equipo de soporte. Puede crear nuevas cuentas de administrador en la sección 
                    <strong>Sistema > Admins</strong>.
                </p>
                <p>
                    <strong>Importante:</strong> Al marcar a un administrador como "Superadmin", le está otorgando control total sobre el sistema, 
                    incluyendo la capacidad de eliminar otros administradores. Use este poder con precaución.
                </p>
            </div>
            @endif

        </div>

        {{-- COLUMNA DERECHA: ÍNDICE --}}
        <div class="col-lg-3">
            <div class="sticky-top" style="top: 20px; z-index: 1;">
                <div class="card card-outline card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Índice del Manual</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            <a href="{{ route('admin.help.index', ['locale' => app()->getLocale()]) }}" class="list-group-item list-group-item-action">
                                1. Introducción
                            </a>
                            <a href="{{ route('admin.help.tickets', ['locale' => app()->getLocale()]) }}" class="list-group-item list-group-item-action">
                                2. Gestión de Tickets
                            </a>
                            <a href="{{ route('admin.help.users', ['locale' => app()->getLocale()]) }}" class="list-group-item list-group-item-action active font-weight-bold">
                                3. Administración de Usuarios
                            </a>
                            <a href="{{ route('admin.help.notifications', ['locale' => app()->getLocale()]) }}" class="list-group-item list-group-item-action">
                                4. Sistema de Notificaciones
                            </a>
                            <a href="{{ route('admin.help.events', ['locale' => app()->getLocale()]) }}" class="list-group-item list-group-item-action">
                                5. Auditoría y Eventos
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
