@extends('layouts.admin')

@section('title', 'Ayuda Admin · Gestión de Usuarios y Accesos')

@section('admincontent')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-sm-8">
            <h1 class="m-0 text-dark">Administración de Identidad y Accesos (IAM)</h1>
            <p class="text-muted">Control total sobre quién accede a la plataforma y qué permisos tiene.</p>
        </div>
        <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.help.index', ['locale' => app()->getLocale()]) }}">Ayuda</a></li>
                <li class="breadcrumb-item active">Usuarios</li>
            </ol>
        </div>
    </div>

    @if(!Auth::guard('admin')->user()->superadmin)
        <div class="alert alert-danger shadow-sm">
            <h5 class="alert-heading"><i class="icon fas fa-ban"></i> Acceso Denegado / Restringido</h5>
            <p>
                Usted está viendo esta documentación, pero <strong>su cuenta actual de Administrador no tiene privilegios de Superadmin</strong>.
                Podrá ver las listas de usuarios, pero es probable que no pueda crear, editar ni eliminar cuentas. 
                Contacte con el Responsable de IT si necesita elevación de privilegios.
            </p>
        </div>
    @endif

    {{-- CONCEPTO: TIPOS DE CUENTAS --}}
    <div class="card card-purple card-outline shadow-sm">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-id-card-alt mr-2"></i> Tipología de Cuentas</h3>
        </div>
        <div class="card-body">
            <p>El sistema maneja dos tablas de usuarios totalmente separadas por razones de seguridad:</p>
            
            <div class="row text-center mt-4">
                <div class="col-md-6 border-right">
                    <div class="mb-3">
                        <span class="fa-stack fa-2x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-user fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <h4 class="text-primary">Usuario Final (User)</h4>
                    <p class="px-4 text-muted">
                        Son los clientes/empleados que solicitan ayuda.
                        <br><strong>Acceso:</strong> Solo Frontend (Área de Cliente).
                        <br><strong>Capacidades:</strong> Crear tickets, ver SUS tickets, comentar.
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <span class="fa-stack fa-2x">
                            <i class="fas fa-circle fa-stack-2x text-danger"></i>
                            <i class="fas fa-user-shield fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <h4 class="text-danger">Administrador (Staff)</h4>
                    <p class="px-4 text-muted">
                        Son los técnicos o agentes de soporte (Usted).
                        <br><strong>Acceso:</strong> Backend (Panel de Control).
                        <br><strong>Capacidades:</strong> Ver y gestionar TODOS los tickets.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- OPERACIONES CRUD USUARIOS --}}
    <div class="card mt-4">
        <div class="card-header bg-light">
            <h3 class="card-title text-dark"><i class="fas fa-users-cog mr-2"></i> Operaciones con Usuarios Finales</h3>
        </div>
        <div class="card-body">
            
            {{-- CREAR --}}
            <div class="media mb-4">
                <div class="mr-3 text-center" style="width: 60px;">
                    <i class="fas fa-user-plus fa-2x text-success"></i>
                </div>
                <div class="media-body">
                    <h5 class="mt-0 text-success font-weight-bold">1. Dar de Alta un Nuevo Usuario</h5>
                    <p>
                        Para que alguien pueda abrir tickets, debe estar registrado. Si no hay auto-registro público, usted debe hacerlo manualmente.
                    </p>
                    <ol>
                        <li>Vaya a <strong>Usuarios > Crear Nuevo</strong>.</li>
                        <li>Rellene obligatoriamente: <strong>Nombre</strong>, <strong>Email</strong> (debe ser único) y <strong>Contraseña</strong>.</li>
                        <li>Comunique las credenciales al usuario por un canal seguro.</li>
                    </ol>
                </div>
            </div>
            <hr>

            {{-- EDITAR --}}
            <div class="media mb-4">
                <div class="mr-3 text-center" style="width: 60px;">
                    <i class="fas fa-user-edit fa-2x text-warning"></i>
                </div>
                <div class="media-body">
                    <h5 class="mt-0 text-warning font-weight-bold">2. Restablecer Contraseña (Password Reset)</h5>
                    <p>
                        La solicitud más común en soporte: "Olvidé mi clave".
                    </p>
                    <ul>
                        <li>Busque al usuario en la lista por email.</li>
                        <li>Haga clic en <i class="fas fa-edit"></i> <strong>Editar</strong>.</li>
                        <li>Escriba una nueva contraseña en el campo "Password". 
                            <span class="badge badge-light border">Nota:</span> Si deja este campo vacío al guardar, la contraseña NO cambiará. Solo escriba para sobrescribirla.
                        </li>
                    </ul>
                </div>
            </div>
            <hr>

            {{-- ELIMINAR --}}
            <div class="media">
                <div class="mr-3 text-center" style="width: 60px;">
                    <i class="fas fa-user-times fa-2x text-danger"></i>
                </div>
                <div class="media-body">
                    <h5 class="mt-0 text-danger font-weight-bold">3. Baja de Usuarios (Peligro)</h5>
                    <div class="alert alert-light border-left-danger">
                        <i class="fas fa-exclamation-triangle text-danger"></i> 
                        <strong>¡Cuidado!</strong> Borrar un usuario elimina su acceso para siempre.
                    </div>
                    <p>
                        <strong>Implicaciones:</strong>
                        Si borra un usuario, los tickets que él creó perderán la referencia visual a su nombre (podrían aparecer como "Usuario Desconocido" o dar error al intentar ver su perfil).
                        <br>
                        <em>Recomendación:</em> Si un empleado deja la empresa, es mejor cambiar su contraseña para impedir el acceso, pero mantener el usuario existente para preservar el histórico de tickets.
                    </p>
                </div>
            </div>

            {{-- ESPACIO PARA CAPTURA: FORMULARIO USUARIO --}}
            <div class="row justify-content-center my-4">
                <div class="col-md-8 border p-3 bg-light text-center rounded">
                    <img src="/img/image%20copy%208.png" class="img-fluid border shadow-sm" alt="Formulario Usuario">
                </div>
            </div>

        </div>
    </div>

    {{-- GESTIÓN DE ADMINS --}}
    @if(Auth::guard('admin')->user()->superadmin)
    <div class="card card-purple collapsed-card mt-3">
        <div class="card-header">
            <h3 class="card-title">Zona Privada: Gestión del Staff (Admin)</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <p>
                Aquí se gestionan sus compañeros. El proceso es idéntico al de usuarios, con una adición crítica: <strong>Privilegios</strong>.
            </p>
            <ul>
                <li><strong>Checkbox Superadmin:</strong> Si lo marca, este nuevo administrador podrá borrar usuarios y crear otros administradores. <strong>Otorgue este poder con moderación.</strong></li>
            </ul>
        </div>
    </div>
    @endif

</div>
@endsection
