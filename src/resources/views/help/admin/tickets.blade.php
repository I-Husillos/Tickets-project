@extends('layouts.admin')

@section('title', 'Ayuda · Gestión de Tickets')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <i class="fas fa-ticket-alt"></i>
                    Guía Completa de Gestión de Tickets
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.help.index', ['locale' => app()->getLocale()]) }}">
                            Ayuda
                        </a>
                    </li>
                    <li class="breadcrumb-item active">Gestión de Tickets</li>
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
                    Tu Rol como Gestor de Tickets
                </h4>
                <p class="mt-3">
                    Como administrador, tu responsabilidad principal es gestionar los tickets 
                    que los usuarios crean. Los tickets representan solicitudes, problemas, 
                    consultas o tareas que los usuarios necesitan que el equipo resuelva.
                </p>
                <p class="mt-3">
                    Tu trabajo es revisar estos tickets, evaluarlos, asignarlos al equipo adecuado, 
                    monitorear su progreso, comunicarte con los usuarios y finalmente resolverlos 
                    de manera satisfactoria. La calidad de tu gestión determina directamente la 
                    satisfacción del usuario.
                </p>
                <p class="mt-3">
                    <strong>Objetivo fundamental:</strong> Transformar problemas de usuarios en soluciones 
                    de manera eficiente, clara y profesional.
                </p>
            </div>
        </div>

        {{-- CICLO DE VIDA --}}
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-sync-alt"></i>
                    Ciclo de Vida Completo de un Ticket
                </h3>
            </div>
            <div class="card-body">
                <p>
                    Cada ticket pasa por varios estados. Entender este ciclo es fundamental 
                    para gestionar eficientemente:
                </p>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <h6><strong>1. 📝 ABIERTO (Nuevo)</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            El usuario acaba de crear el ticket. No ha sido revisado aún.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Tu acción:</strong> Revisarlo, confirmar que está claro, 
                            responder al usuario con un reconocimiento.
                        </p>

                        <h6 class="mt-3"><strong>2. 👀 EN REVISIÓN</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            Estás analizando el ticket, formulando preguntas o recopilando 
                            información adicional.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Tu acción:</strong> Comunicarte con el usuario si necesitas 
                            detalles, pedir documentación, etc.
                        </p>

                        <h6 class="mt-3"><strong>3. 🔄 EN PROGRESO</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            Ya identificaste la solución y estás trabajando en ella activamente.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Tu acción:</strong> Ejecutar la solución, mantener comunicado 
                            al usuario del avance.
                        </p>
                    </div>

                    <div class="col-md-6">
                        <h6><strong>4. ✅ RESUELTO</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            Implementaste la solución y crees que el problema está resuelto.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Tu acción:</strong> Comunicar la solución claramente al usuario, 
                            solicitar confirmación de que está satisfecho.
                        </p>

                        <h6 class="mt-3"><strong>5. ⏸️ PAUSADO</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            Necesitas esperar información del usuario o de terceros antes de continuar.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Tu acción:</strong> Dejar claro al usuario qué esperas y cuándo 
                            lo necesitas.
                        </p>

                        <h6 class="mt-3"><strong>6. 🔒 CERRADO</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            El usuario confirmó que está satisfecho y el problema está totalmente resuelto.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Tu acción:</strong> Ninguna. El ticket termina aquí (puede reabrirse).
                        </p>
                    </div>
                </div>

                <div class="alert alert-warning mt-3">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <strong>Importante:</strong> Mantén comunicación constante con el usuario en cada transición 
                    de estado. No cambies estado sin avisar al usuario.
                </div>
            </div>
        </div>

        {{-- PRIORIDADES --}}
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-exclamation-triangle"></i>
                    Niveles de Prioridad Explicados
                </h3>
            </div>
            <div class="card-body">
                <p>
                    Los tickets tienen diferentes prioridades que ayudan a organizar tu trabajo:
                </p>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6><i class="fas fa-arrow-up text-danger"></i> <strong>🔴 CRÍTICA</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Cuándo:</strong> El sistema está caído, datos se pierden o hay 
                            acceso no autorizado.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Tiempo esperado:</strong> Resolución en horas, no días.
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Acción:</strong> Prioriza esto por encima de todo. Dedica 
                            recursos inmediatamente.
                        </p>

                        <h6 class="mt-3"><i class="fas fa-arrow-up text-warning"></i> <strong>🟠 ALTA</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Cuándo:</strong> Funcionalidad importante no trabaja, afecta 
                            muchos usuarios o causa pérdida de productividad.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Tiempo esperado:</strong> Resolución en 1-2 días.
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Acción:</strong> Atiende poco después de crítica. Escala 
                            si es necesario.
                        </p>
                    </div>

                    <div class="col-md-6">
                        <h6><i class="fas fa-minus text-info"></i> <strong>🔵 NORMAL</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Cuándo:</strong> Funcionalidad afectada pero hay workaround, 
                            impacto limitado.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Tiempo esperado:</strong> Resolución en 3-7 días.
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Acción:</strong> Atiende según capacidad disponible.
                        </p>

                        <h6 class="mt-3"><i class="fas fa-arrow-down text-secondary"></i> <strong>⚪ BAJA</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Cuándo:</strong> Mejoras estéticas, solicitudes de features nuevas, 
                            soluciones workaround disponibles.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Tiempo esperado:</strong> Resolución en 2+ semanas.
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Acción:</strong> Planifica para futuro, no es urgente.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- FLUJO DE TRABAJO --}}
        <div class="card card-outline card-warning">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-tasks"></i>
                    Flujo de Trabajo Recomendado
                </h3>
            </div>
            <div class="card-body">
                <p>
                    Sigue este proceso para una gestión eficiente:
                </p>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <h6><strong>Paso 1: Revisar Nuevos Tickets Diariamente</strong></h6>
                        <p class="text-muted text-sm">
                            Accede al panel y filtra por estado "Abierto". Revisa cada nuevo 
                            ticket en el orden que llegó. Esto asegura que ningún usuario queda 
                            abandonado.
                        </p>

                        <h6 class="mt-3"><strong>Paso 2: Evaluar Claridad y Completitud</strong></h6>
                        <p class="text-muted text-sm">
                            ¿Es claro qué necesita el usuario? ¿Tienen suficiente información? 
                            Si falta info, cambia estado a "En revisión" e inmediatamente envía 
                            un comentario pidiendo aclaración.
                        </p>

                        <h6 class="mt-3"><strong>Paso 3: Clasificar por Prioridad</strong></h6>
                        <p class="text-muted text-sm">
                            Asigna la prioridad correcta basándote en impacto y urgencia. 
                            Usuarios con problemas críticos necesitan respuesta rápida.
                        </p>

                        <h6 class="mt-3"><strong>Paso 4: Asignar o Tomar Responsabilidad</strong></h6>
                        <p class="text-muted text-sm">
                            ¿Lo puedes resolver tú? Tómate la responsabilidad. ¿Necesita 
                            otro especialista? Asígnalo claramente y notifícalos.
                        </p>

                        <h6 class="mt-3"><strong>Paso 5: Comunicar Cambios de Estado</strong></h6>
                        <p class="text-muted text-sm">
                            Cada vez que cambies estado, deja un comentario explicando por qué. 
                            "Movido a En Progreso - estamos implementando la solución" es mejor 
                            que ningún comentario.
                        </p>

                        <h6 class="mt-3"><strong>Paso 6: Resolver y Validar</strong></h6>
                        <p class="text-muted text-sm">
                            Cuando creas haber resuelto, documenta exactamente qué hiciste en 
                            un comentario. Cambia a "Resuelto" y pide confirmación al usuario.
                        </p>

                        <h6 class="mt-3"><strong>Paso 7: Cerrar con Confirmación</strong></h6>
                        <p class="text-muted text-sm">
                            Solo cierra el ticket si el usuario confirma que está satisfecho. 
                            Si no confirma en 3-5 días, recontacta.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- BUENAS PRÁCTICAS --}}
        <div class="card card-outline card-secondary">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-star"></i>
                    Mejores Prácticas de Gestión
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6><i class="fas fa-check text-success"></i> <strong>Lo que Deberías Hacer:</strong></h6>
                        <ul style="font-size: 0.9em;">
                            <li>✅ Responde en menos de 24h (idealemente menos de 6h)</li>
                            <li>✅ Sé específico en tus comentarios</li>
                            <li>✅ Reconoce el problema del usuario</li>
                            <li>✅ Proporciona actualizaciones regularmente</li>
                            <li>✅ Explica soluciones en lenguaje simple</li>
                            <li>✅ Pide confirmación antes de cerrar</li>
                            <li>✅ Sé profesional y respetuoso siempre</li>
                            <li>✅ Registra decisiones en el historial</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6><i class="fas fa-times text-danger"></i> <strong>Lo que NO Deberías Hacer:</strong></h6>
                        <ul style="font-size: 0.9em;">
                            <li>❌ Abandonar un ticket sin explicación</li>
                            <li>❌ Cambiar estado sin avisar al usuario</li>
                            <li>❌ Ser genérico o vago en respuestas</li>
                            <li>❌ Cerrar sin confirmación del usuario</li>
                            <li>❌ Usar jerga técnica innecesaria</li>
                            <li>❌ Prometer tiempos que no puedes cumplir</li>
                            <li>❌ Ignorar tickets de baja prioridad</li>
                            <li>❌ Hacer cambios sin documentar</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- SITUACIONES COMUNES --}}
        <div class="card card-outline card-danger">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-exclamation-triangle"></i>
                    Situaciones Comunes y Cómo Manejarlas
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6><strong>Situación: Usuario Enojado</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Síntoma:</strong> El usuario se frustra en sus comentarios.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Tu respuesta:</strong> Reconoce su frustración. "Entiendo que 
                            esto te causa inconveniente. Aquí es cómo lo resolveremos..."
                        </p>

                        <h6 class="mt-3"><strong>Situación: Problema Irreproducible</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Síntoma:</strong> El usuario reporta un problema pero tú no 
                            logras reproducirlo.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Tu respuesta:</strong> Pide pasos exactos, capturas de pantalla, 
                            información del navegador. "Necesito replicar exactamente lo que hiciste."
                        </p>

                        <h6 class="mt-3"><strong>Situación: El Usuario Desaparece</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Síntoma:</strong> Pide la solución pero no responde a seguimientos.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Tu respuesta:</strong> Espera 3-5 días, recontacta. Si tampoco 
                            responde, avisa que cerrarás el ticket.
                        </p>
                    </div>

                    <div class="col-md-6">
                        <h6><strong>Situación: Ticket Duplicado</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Síntoma:</strong> Mismo usuario o diferente reporta lo mismo.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Tu respuesta:</strong> Vincula a la otra ticket. Consolida la 
                            información y continúa con una sola.
                        </p>

                        <h6 class="mt-3"><strong>Situación: Solicitud Fuera de Alcance</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Síntoma:</strong> El usuario pide algo que el sistema no puede hacer.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Tu respuesta:</strong> Explica por qué no es posible. Ofrece 
                            alternativas. "No podemos hacer X, pero podemos hacer Y que logra lo mismo."
                        </p>

                        <h6 class="mt-3"><strong>Situación: Error del Usuario, No del Sistema</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Síntoma:</strong> El usuario hace algo mal y cree que es un bug.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Tu respuesta:</strong> No culpes. Guía educadamente: "Los pasos 
                            correctos son..." Esto convierte un cliente enojado en uno educado.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="alert alert-info mt-4">
            <i class="fas fa-lightbulb mr-2"></i>
            <strong>Regla de Oro:</strong> Un cliente bien atendido es más valioso que cualquier 
            ticket cerrado rápidamente. Invierte en relaciones.
        </div>

    </div>
@endsection
