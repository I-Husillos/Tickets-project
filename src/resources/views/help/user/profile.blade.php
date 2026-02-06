@extends('layouts.user')

@section('title', 'Ayuda · Mi Perfil')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Gestión dell Perfil y Cuenta</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('user.help.index', ['locale' => app()->getLocale()]) }}">Ayuda</a></li>
                <li class="breadcrumb-item active">Perfil</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-md-6">
            {{-- VER INFORMACIÓN --}}
            <div class="card card-outline card-secondary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-id-card mr-2"></i> Ver mi Información</h3>
                </div>
                <div class="card-body">
                    <p>
                        Para acceder a tus datos personales registrados en la aplicación:
                    </p>
                    <ol>
                        <li>Haz clic en tu <strong>Nombre</strong> en la esquina superior derecha (barra superior).</li>
                        <li>Selecciona la opción <strong>"Mi Perfil"</strong> en el menú desplegable.</li>
                    </ol>
                    <p class="mt-3">
                        En esta pantalla podrás visualizar:
                    </p>
                    <ul>
                        <li><strong>Nombre Completo:</strong> Tal como figura en el sistema.</li>
                        <li><strong>Correo Electrónico:</strong> Tu dirección de email vinculada para notificaciones.</li>
                        <li><strong>Tickets Creados:</strong> Un contador histórico de todas tus solicitudes.</li>
                    </ul>
                    
                    <div class="callout callout-info mt-4">
                        <h5><i class="fas fa-edit"></i> ¿Cómo edito mis datos?</h5>
                        <p>
                            Actualmente, la edición directa de nombre o correo electrónico está deshabilitada por razones de seguridad y consistencia de datos corporativos.
                        </p>
                        <p>
                            Si detectas un error en tu información o necesitas actualizar tu email, por favor <strong>crea un ticket</strong> de tipo "Consulta" o "Administrativo" solicitando el cambio al equipo de soporte.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            {{-- SEGURIDAD Y SESIÓN --}}
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-shield-alt mr-2"></i> Seguridad y Sesión</h3>
                </div>
                <div class="card-body">
                    <h5>Cerrar Sesión</h5>
                    <p>
                        Si utilizas un ordenador compartido o público, es crucial que cierres tu sesión al terminar.
                    </p>
                    <ul>
                        <li>Haz clic en el icono de <strong>"Puerta"</strong> o "Cerrar Sesión" en la barra superior derecha.</li>
                        <li>O despliega el menú de usuario y selecciona "Salir".</li>
                    </ul>

                    <h5 class="mt-4">Cambio de Contraseña</h5>
                     <p>
                        Si has olvidado tu contraseña o deseas cambiarla, deberás utilizar el enlace "¿Olvidaste tu contraseña?" en la pantalla de inicio de sesión, o contactar con un administrador para que te envíe un enlace de restablecimiento.
                    </p>
                </div>
            </div>
            
            {{-- IDIOMA --}}
             <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-language mr-2"></i> Idioma</h3>
                </div>
                <div class="card-body">
                    <p>
                        La aplicación está disponible en varios idiomas (Español e Inglés).
                        Puedes cambiar el idioma de la interfaz en cualquier momento usando el selector (icono de bandera) situado en la barra superior.
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
