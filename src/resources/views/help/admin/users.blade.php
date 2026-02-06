@extends('layouts.admin')

@section('title', 'Ayuda · Gestión de Usuarios')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <i class="fas fa-users"></i>
                    Guía Completa de Gestión de Usuarios
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.help.index', ['locale' => app()->getLocale()]) }}">
                            Ayuda
                        </a>
                    </li>
                    <li class="breadcrumb-item active">Gestión de Usuarios</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('admincontent')
    <div class="container-fluid">

        {{-- INTRODUCCIÓN --}}
        <div class="card card-outline card-primary">
            <div class="card-body">
                <h4>
                    <i class="fas fa-info-circle"></i>
                    Entendiendo a los Usuarios del Sistema
                </h4>
                <p class="mt-3">
                    Los usuarios son las personas que utilizan tu sistema para crear tickets 
                    y solicitar soporte. Son el corazón del ecosistema - sin usuarios no hay 
                    tickets, sin tickets no hay trabajo.
                </p>
                <p class="mt-3">
                    Como administrador, tu relación con los usuarios es fundamental. Ellos 
                    necesitan sentir que son escuchados, que sus problemas importan y que 
                    el equipo está trabajando para resolverlos. La experiencia del usuario 
                    depende directamente de cómo se gestiona su cuenta y cómo se atienden 
                    sus solicitudes.
                </p>
                <p class="mt-3">
                    Esta guía te ayudará a comprender cómo crear usuarios, manejar sus cuentas, 
                    resolver problemas comunes y proporcionar una experiencia excepcional.
                </p>
            </div>
        </div>

        {{-- CREAR USUARIO --}}
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-user-plus"></i>
                    Crear un Nuevo Usuario
                </h3>
            </div>
            <div class="card-body">
                <p>
                    Crear un usuario es simple pero importante. Aquí se explica:
                </p>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <h6><strong>Paso 1: Acceder a Usuarios</strong></h6>
                        <p class="text-muted text-sm">
                            En el menú lateral, haz clic en "Usuarios". Verás la lista de 
                            usuarios existentes.
                        </p>

                        <h6 class="mt-3"><strong>Paso 2: Hacer Clic en "Nuevo Usuario"</strong></h6>
                        <p class="text-muted text-sm">
                            Busca el botón verde "+ Nuevo Usuario" o similar. Esto abre un 
                            formulario para crear.
                        </p>

                        <h6 class="mt-3"><strong>Paso 3: Completar Información Básica</strong></h6>
                        <p class="text-muted text-sm">
                            <strong>Nombre:</strong> Nombre completo del usuario (ej: "Juan García")
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Email:</strong> Debe ser única y válida (ej: "juan@empresa.com"). 
                            Los usuarios usarán esto para iniciar sesión.
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Contraseña:</strong> Una contraseña temporal segura. El usuario 
                            la puede cambiar después de primer acceso.
                        </p>

                        <h6 class="mt-3"><strong>Paso 4: Configurar Permisos (si aplica)</strong></h6>
                        <p class="text-muted text-sm">
                            Algunos usuarios pueden tener permisos especiales. Marca estos solo 
                            si es necesario. La mayoría de usuarios tienen permisos básicos.
                        </p>

                        <h6 class="mt-3"><strong>Paso 5: Guardar</strong></h6>
                        <p class="text-muted text-sm">
                            Haz clic en "Guardar" o "Crear usuario". El usuario ahora puede 
                            acceder al sistema.
                        </p>
                    </div>
                </div>

                <div class="alert alert-warning mt-3">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    <strong>Buena Práctica:</strong> Notifica al usuario nuevo con un email 
                    amigable explicando cómo acceder y qué pueden hacer.
                </div>
            </div>
        </div>

        {{-- TIPOS DE USUARIOS --}}
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-sitemap"></i>
                    Categorías de Usuarios
                </h3>
            </div>
            <div class="card-body">
                <p>
                    No todos los usuarios son iguales. Entender sus categorías te ayuda 
                    a gestionar mejor:
                </p>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6><i class="fas fa-user text-primary"></i> <strong>Usuario Regular</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Quiénes son:</strong> La mayoría de usuarios. Pueden crear 
                            tickets y comentar en sus propios tickets.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Qué pueden hacer:</strong>
                        </p>
                        <ul style="font-size: 0.85em;">
                            <li>✓ Crear nuevos tickets</li>
                            <li>✓ Ver sus propios tickets</li>
                            <li>✓ Comentar en sus tickets</li>
                            <li>✓ Editar información personal</li>
                            <li>✓ Ver notificaciones</li>
                        </ul>

                        <p class="text-muted text-sm mt-2">
                            <strong>Qué NO pueden hacer:</strong>
                        </p>
                        <ul style="font-size: 0.85em;">
                            <li>✗ Ver otros tickets</li>
                            <li>✗ Acceder al panel administrativo</li>
                            <li>✗ Crear otros usuarios</li>
                            <li>✗ Cambiar configuración global</li>
                        </ul>
                    </div>

                    <div class="col-md-6">
                        <h6><i class="fas fa-user-circle text-info"></i> <strong>Usuario Verificado/Premium</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Quiénes son:</strong> Usuarios especiales con permisos extendidos 
                            (si tu sistema lo soporta).
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Beneficios adicionales:</strong>
                        </p>
                        <ul style="font-size: 0.85em;">
                            <li>✓ Prioridad mayor en tickets</li>
                            <li>✓ Límite más alto de tickets concurrentes</li>
                            <li>✓ Acceso a funciones beta (si aplica)</li>
                            <li>✓ Soporte prioritario</li>
                        </ul>

                        <p class="text-muted text-sm mt-2">
                            <strong>Cuándo usarlo:</strong> Clientes VIP, empresas importantes, 
                            partners estratégicos.
                        </p>
                    </div>
                </div>

                <div class="alert alert-info mt-3">
                    <i class="fas fa-info-circle mr-2"></i>
                    <strong>Nota:</strong> Los administradores son diferentes a los usuarios. 
                    Los admins gestionan el sistema, no crean tickets como usuarios normales.
                </div>
            </div>
        </div>

        {{-- GESTIÓN DE CUENTA --}}
        <div class="card card-outline card-warning">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-cog"></i>
                    Gestionar Cuentas de Usuario
                </h3>
            </div>
            <div class="card-body">
                <p>
                    Como admin, puedes realizar varias acciones en las cuentas de usuario:
                </p>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6><strong>Editar Información Personal</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            Haz clic en el usuario para ver sus detalles. Puedes editar:
                        </p>
                        <ul style="font-size: 0.85em;">
                            <li>📝 Nombre</li>
                            <li>✉️ Email</li>
                            <li>🔐 Contraseña (resetear)</li>
                            <li>📱 Teléfono (si aplica)</li>
                            <li>🏢 Empresa/Departamento</li>
                        </ul>

                        <h6 class="mt-3"><strong>Resetear Contraseña</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            Si un usuario olvida su contraseña o está comprometida, puedes 
                            resetearla desde el panel.
                        </p>
                        <p class="text-muted text-sm">
                            Genera una contraseña temporal segura y envíasela de forma segura.
                        </p>

                        <h6 class="mt-3"><strong>Ver Actividad</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            En el historial de eventos, puedes ver qué hizo cada usuario 
                            para auditoría o soporte.
                        </p>
                    </div>

                    <div class="col-md-6">
                        <h6><strong>Cambiar Permisos</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            Puedes modificar el nivel de permisos de un usuario:
                        </p>
                        <ul style="font-size: 0.85em;">
                            <li>⬆️ Elevar permisos (si lo necesita)</li>
                            <li>⬇️ Reducir permisos (si abusó)</li>
                            <li>🔐 Bloquear temporalmente</li>
                        </ul>

                        <h6 class="mt-3"><strong>Eliminar Usuario</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            ⚠️ Acción peligrosa. Eliminar un usuario:
                        </p>
                        <ul style="font-size: 0.85em;">
                            <li>❌ Elimina su cuenta</li>
                            <li>❌ Mantiene sus tickets (importante para auditoría)</li>
                            <li>❌ No puede recuperarse fácilmente</li>
                        </ul>
                        <p class="text-muted text-sm">
                            Usa esto solo cuando sea absoluto necesario. Confirma dos veces.
                        </p>

                        <h6 class="mt-3"><strong>Suspender vs Eliminar</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Suspender:</strong> Usuario no puede acceder (pero datos permanecen)
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Eliminar:</strong> Remover completamente. Usar solo si es necesario.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- PROBLEMAS COMUNES --}}
        <div class="card card-outline card-danger">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-headset"></i>
                    Problemas Comunes de Usuarios y Soluciones
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6><strong>Problema: No Recibió Email de Bienvenida</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Causa probable:</strong> Email en spam, dirección incorrecta, 
                            o sistema de email configurado incorrectamente.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Solución:</strong> Reenvia manualmente el email o proporciona 
                            los datos directamente en conversación.
                        </p>

                        <h6 class="mt-3"><strong>Problema: Olvidó Contraseña</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Síntoma:</strong> El usuario no puede entrar, botón "Olvider 
                            contraseña" no trabaja o no recibe reset.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Solución:</strong> Desde admin, resetea la contraseña y envía 
                            nueva.
                        </p>

                        <h6 class="mt-3"><strong>Problema: Cuenta Bloqueada</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Síntoma:</strong> Usuario intentó acceder demasiadas veces 
                            incorrectamente.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Solución:</strong> Espera una hora o desbloqueala manualmente 
                            desde admin.
                        </p>

                        <h6 class="mt-3"><strong>Problema: No Recibe Notificaciones</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Causa probable:</strong> Filtros de email, configuración 
                            de preferencias, o notificaciones deshabilitadas.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Solución:</strong> Verifica el historial de eventos para 
                            confirmar que se enviaron, revisa configuración de preferencias.
                        </p>
                    </div>

                    <div class="col-md-6">
                        <h6><strong>Problema: No Puede Crear Tickets</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Causa probable:</strong> Límite alcanzado, permisos 
                            reducidos, o cuenta suspendida.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Solución:</strong> Verifica sus permisos y límites. Si está 
                            bloqueado, restablece los permisos.
                        </p>

                        <h6 class="mt-3"><strong>Problema: Email Duplicado</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Síntoma:</strong> Accidentalmente intentaste crear usuario 
                            con email existente.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Solución:</strong> El sistema previene esto. Si sucede, 
                            vincula al usuario existente.
                        </p>

                        <h6 class="mt-3"><strong>Problema: Usuario Muy Activo (Spam)</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Síntoma:</strong> Usuario crea tickets innecesarios, 
                            comenta excesivamente sin valor.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Solución:</strong> Comunícate, educa sobre uso correcto. 
                            Si abusa, reduce permisos temporalmente.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- BUENAS PRÁCTICAS --}}
        <div class="card card-outline card-secondary">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-lightbulb"></i>
                    Mejores Prácticas de Gestión de Usuarios
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6><i class="fas fa-check text-success"></i> <strong>Lo que Deberías Hacer:</strong></h6>
                        <ul style="font-size: 0.9em;">
                            <li>✅ Bienvenida calurosa para usuarios nuevos</li>
                            <li>✅ Responde preguntas sobre cómo usar el sistema</li>
                            <li>✅ Documenta cambios en el historial</li>
                            <li>✅ Mantén datos actualizados</li>
                            <li>✅ Monitorea inactividad de usuarios</li>
                            <li>✅ Sé proactivo en soporte</li>
                            <li>✅ Respeta la privacidad del usuario</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6><i class="fas fa-times text-danger"></i> <strong>Lo que NO Deberías Hacer:</strong></h6>
                        <ul style="font-size: 0.9em;">
                            <li>❌ Crear cuentas duplicadas</li>
                            <li>❌ Compartir contraseñas de usuarios</li>
                            <li>❌ Eliminar sin documentar</li>
                            <li>❌ Cambiar datos sin notificar</li>
                            <li>❌ Bloquear sin avisar</li>
                            <li>❌ Ignorar solicitudes de soporte</li>
                            <li>❌ Usar cuentas de usuario para pruebas</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- SEGURIDAD Y PRIVACIDAD --}}
        <div class="card card-outline card-light">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-lock"></i>
                    Seguridad y Privacidad de Datos de Usuarios
                </h3>
            </div>
            <div class="card-body">
                <p>
                    Los datos de usuario son sensibles. Mantenlos seguros:
                </p>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6><strong>Contraseñas:</strong></h6>
                        <ul style="font-size: 0.9em;">
                            <li>🔐 Nunca compartas contraseñas en texto plano</li>
                            <li>🔐 Usa email seguro o portal para reseteos</li>
                            <li>🔐 Requiere cambio después de reseteo</li>
                        </ul>

                        <h6 class="mt-3"><strong>Datos Personales:</strong></h6>
                        <ul style="font-size: 0.9em;">
                            <li>📋 Solo accede si es necesario</li>
                            <li>📋 No compartas con terceros sin consentimiento</li>
                            <li>📋 Cumple con GDPR si aplica</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6><strong>Auditoría:</strong></h6>
                        <ul style="font-size: 0.9em;">
                            <li>📊 Registra acceso a datos sensibles</li>
                            <li>📊 Revisa historial de eventos regularmente</li>
                            <li>📊 Documenta cambios significativos</li>
                        </ul>

                        <h6 class="mt-3"><strong>Cumplimiento:</strong></h6>
                        <ul style="font-size: 0.9em;">
                            <li>✅ Conoce tus políticas de privacidad</li>
                            <li>✅ Sigue regulaciones locales</li>
                            <li>✅ Mantén registros de auditoría</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="alert alert-info mt-4">
            <i class="fas fa-heart mr-2"></i>
            <strong>Filosofía:</strong> Cada usuario es importante. El respeto y cuidado 
            que muestres en su gestión refleja los valores del sistema.
        </div>

    </div>
@endsection
