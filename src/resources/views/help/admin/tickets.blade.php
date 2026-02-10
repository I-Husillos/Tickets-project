@extends('layouts.admin')

@section('title', 'Documentación - Gestión de Tickets')

@section('admincontent')
<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header bg-success text-white">
            <h2 class="mb-0"><i class="fas fa-ticket-alt"></i> Gestión de Tickets</h2>
            <p class="mb-0 mt-2">Guía completa para administrar, asignar y resolver tickets de usuarios</p>
        </div>
        <div class="card-body">
            
            {{-- Índice de contenido --}}
            <section class="mb-5">
                <div class="alert alert-info">
                    <h5><i class="fas fa-list"></i> En esta guía aprenderás:</h5>
                    <ul class="mb-0">
                        <li><a href="#listado">Ver y filtrar la lista de tickets</a></li>
                        <li><a href="#tipos">Entender los estados y prioridades</a></li>
                        <li><a href="#asignados">Ver tus tickets asignados</a></li>
                        <li><a href="#detalles">Ver detalles de un ticket</a></li>
                        <li><a href="#editar">Editar y actualizar tickets</a></li>
                        <li><a href="#comentarios">Añadir comentarios</a></li>
                        <li><a href="#asignar">Asignar tickets a administradores</a></li>
                    </ul>
                </div>
            </section>

            {{-- SECCIÓN: ACCESO Y DIFERENCIAS --}}
            <section class="mb-5">
                <h3 class="text-primary border-bottom pb-2"><i class="fas fa-door-open"></i> Acceso a la Gestión de Tickets</h3>
                
                <p>El acceso a los tickets depende de tu tipo de cuenta de administrador:</p>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card border-info h-100">
                            <div class="card-header bg-info text-white">
                                <h5 class="mb-0"><i class="fas fa-user"></i> Administrador Normal</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>Opción en el menú:</strong> "Ver Mis Tickets"</p>
                                <p><strong>Qué ves:</strong> Solo los tickets que te han sido <strong>asignados específicamente</strong></p>
                                <p><strong>Ruta de navegación:</strong></p>
                                <ul>
                                    <li>Menú lateral → <strong>"Tickets"</strong> → Click para expandir</li>
                                    <li>Aparece: <strong>"Ver Mis Tickets"</strong></li>
                                </ul>
                                <p class="mb-0"><strong>Limitación:</strong> No puedes ver tickets de otros administradores ni tickets sin asignar (a menos que te los asignen).</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-danger h-100">
                            <div class="card-header bg-danger text-white">
                                <h5 class="mb-0"><i class="fas fa-user-shield"></i> Superadministrador</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>Opciones en el menú:</strong> "Gestionar Tickets" Y "Ver Mis Tickets"</p>
                                <p><strong>Qué ves en "Gestionar Tickets":</strong> <strong>TODOS</strong> los tickets del sistema (asignados, sin asignar, de todos los administradores)</p>
                                <p><strong>Qué ves en "Ver Mis Tickets":</strong> Solo los que te asignaron a ti (vista filtrada)</p>
                                <p class="mb-0"><strong>Ventaja:</strong> Acceso completo para redistribuir carga de trabajo, auditar tickets, o gestionar emergencias.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- SECCIÓN: LISTADO DE TICKETS --}}
            <section class="mb-5" id="listado">
                <h3 class="text-primary border-bottom pb-2"><i class="fas fa-list"></i> La Pantalla de Lista de Tickets</h3>

                <h4 class="mt-4"><i class="fas fa-table"></i> Columnas de la Tabla</h4>
                <p>Los tickets se muestran en una tabla con las siguientes columnas:</p>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Columna</th>
                                <th>Qué muestra</th>
                                <th>Para qué sirve</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>ID</strong></td>
                                <td>Identificador único del ticket</td>
                                <td>Referencia rápida del ticket</td>
                            </tr>
                            <tr>
                                <td><strong>Título</strong></td>
                                <td>Resumen del problema</td>
                                <td>Identificar rápidamente de qué trata el ticket</td>
                            </tr>
                            <tr>
                                <td><strong>Descripción</strong></td>
                                <td>Primeras líneas de la descripción (recortada)</td>
                                <td>Vista previa del contenido. Se muestra completa al ver detalles</td>
                            </tr>
                            <tr>
                                <td><strong>Estado</strong></td>
                                <td>Badge de color según el estado actual</td>
                                <td>Saber en qué fase del ciclo está el ticket</td>
                            </tr>
                            <tr>
                                <td><strong>Prioridad</strong></td>
                                <td>Badge de color según urgencia</td>
                                <td>Identificar qué tickets atender primero</td>
                            </tr>
                            <tr>
                                <td><strong>Tipo</strong></td>
                                <td>Categoría del ticket</td>
                                <td>Bug, Mejora, Solicitud, Consulta, etc.</td>
                            </tr>
                            <tr>
                                <td><strong>Comentarios</strong></td>
                                <td>Número de comentarios</td>
                                <td>Ver cuánta conversación ha habido</td>
                            </tr>
                            <tr>
                                <td><strong>Asignado a</strong></td>
                                <td>Nombre del administrador asignado</td>
                                <td>Saber quién es responsable (solo para superadmin)</td>
                            </tr>
                            <tr>
                                <td><strong>Acciones</strong></td>
                                <td>Botón "Ver" (ojo azul)</td>
                                <td>Acceder a los detalles completos</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="text-center mb-5 p-3 bg-light border rounded">
                            <img src="/img/admin-ticketsintro o -table.png" class="img-fluid mt-3 border shadow-sm" alt="Tarjeta de eventos recientes">
                            <p class="text-muted small mt-2">Ejemplo de tabla de tickets.</p>
                    </div>
                </div>

                {{-- Herramientas de la tabla --}}
                <h4 class="mt-4"><i class="fas fa-tools"></i> Herramientas de Búsqueda y Filtrado</h4>

                <div class="card mb-3 border-primary">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-search"></i> Búsqueda General
                    </div>
                    <div class="card-body">
                        <p><strong>Ubicación:</strong> Esquina superior derecha de la tabla</p>
                        <p><strong>Cómo funciona:</strong></p>
                        <ul>
                            <li>Escribe cualquier palabra clave: título, descripción, ID, nombre de usuario, etc.</li>
                            <li>La tabla filtra automáticamente mientras escribes</li>
                            <li>Busca en todas las columnas visibles simultáneamente</li>
                            <li>Borra el texto para restaurar la vista completa</li>
                        </ul>
                        <p class="mb-0"><strong>Ejemplo:</strong> Escribe "acceso" para encontrar todos los tickets relacionados con problemas de acceso</p>
                    </div>
                </div>

                <div class="card mb-3 border-success">
                    <div class="card-header bg-success text-white">
                        <i class="fas fa-filter"></i> Filtros Específicos
                    </div>
                    <div class="card-body">
                        <p>Además de la búsqueda general, puedes usar filtros específicos ubicados en la parte superior de la pantalla (antes de la tabla):</p>

                        <h6 class="mt-3"><strong>1. Filtro por Estado</strong></h6>
                        <div class="form-group">
                            <label>Estado:</label>
                            <select class="form-control" disabled>
                                <option>Todos</option>
                                <option>Nuevo</option>
                                <option>Pendiente</option>
                                <option>En Proceso</option>
                                <option>Resuelto</option>
                                <option>Cerrado</option>
                            </select>
                        </div>
                        <p><strong>Útil para:</strong> Ver solo tickets pendientes de atención, o solo los ya resueltos</p>

                        <h6 class="mt-3"><strong>2. Filtro por Prioridad</strong></h6>
                        <div class="form-group">
                            <label>Prioridad:</label>
                            <select class="form-control" disabled>
                                <option>Todas</option>
                                <option>Baja</option>
                                <option>Media</option>
                                <option>Alta</option>
                                <option>Crítica</option>
                            </select>
                        </div>
                        <p><strong>Útil para:</strong> Enfocarte primero en tickets urgentes o críticos</p>

                        <h6 class="mt-3"><strong>3. Filtro por Tipo</strong></h6>
                        <div class="form-group">
                            <label>Tipo:</label>
                            <select class="form-control" disabled>
                                <option>Todos</option>
                                <option>Bug</option>
                                <option>Mejora</option>
                                <option>Solicitud</option>
                                <option>Consulta</option>
                            </select>
                        </div>
                        <p class="mb-0"><strong>Útil para:</strong> Agrupar tickets por categoría y organizarlos por especialización</p>

                        <div class="alert alert-info mt-3">
                            <i class="fas fa-info-circle"></i> Los filtros se pueden <strong>combinar</strong>. Por ejemplo: Estado = "Pendiente" + Prioridad = "Alta" mostrará solo tickets pendientes de alta prioridad.
                        </div>
                    </div>
                </div>

                <div class="card border-warning">
                    <div class="card-header bg-warning text-dark">
                        <i class="fas fa-list-ol"></i> Paginación y Ordenación
                    </div>
                    <div class="card-body">
                        <p><strong>Selector de registros por página:</strong></p>
                        <ul>
                            <li>Ubicado en la esquina superior izquierda</li>
                            <li>Opciones: 10, 25, 50 o 100 tickets por página</li>
                            <li>Por defecto muestra 10</li>
                        </ul>

                        <p><strong>Controles de paginación:</strong></p>
                        <ul>
                            <li>Parte inferior de la tabla</li>
                            <li>Botones "Anterior" y "Siguiente"</li>
                            <li>Números de página para saltar directamente</li>
                        </ul>

                        <p class="mb-0"><strong>Ordenar columnas:</strong></p>
                        <ul class="mb-0">
                            <li>Haz clic en el encabezado de cualquier columna</li>
                            <li>Primer clic: ascendente (A→Z, 1→9, más antiguo→más reciente)</li>
                            <li>Segundo clic: descendente (Z→A, 9→1, más reciente→más antiguo)</li>
                        </ul>
                    </div>
                </div>
            </section>

            {{-- SECCIÓN: ESTADOS Y PRIORIDADES --}}
            <section class="mb-5" id="tipos">
                <h3 class="text-primary border-bottom pb-2"><i class="fas fa-tags"></i> Estados, Prioridades y Tipos</h3>

                <h4 class="mt-4"><i class="fas fa-traffic-light"></i> Estados del Ticket</h4>
                <p>Los tickets pasan por diferentes estados durante su ciclo de vida:</p>

                <div class="row">
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card border-primary h-100">
                            <div class="card-header bg-primary text-white">
                                <strong>Nuevo</strong>
                            </div>
                            <div class="card-body">
                                <p><strong>Qué significa:</strong> Ticket recién creado que aún no ha sido revisado por ningún administrador</p>
                                <p><strong>Acción recomendada:</strong> Revisar, asignar a un administrador, y cambiar a "Pendiente" o "En Proceso"</p>
                                <p class="mb-0"><strong>Color del badge:</strong> Azul claro</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card border-warning h-100">
                            <div class="card-header bg-warning text-dark">
                                <strong>Pendiente</strong>
                            </div>
                            <div class="card-body">
                                <p><strong>Qué significa:</strong> Ticket asignado a un administrador pero aún no se ha empezado a trabajar en él</p>
                                <p><strong>Acción recomendada:</strong> Cuando empieces a trabajar en él, cámbialo a "En Proceso"</p>
                                <p class="mb-0"><strong>Color del badge:</strong> Amarillo</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card border-info h-100">
                            <div class="card-header bg-info text-white">
                                <strong>En Proceso</strong>
                            </div>
                            <div class="card-body">
                                <p><strong>Qué significa:</strong> Estás trabajando activamente en resolver el problema</p>
                                <p><strong>Acción recomendada:</strong> Mantén este estado mientras investigas. Cuando tengas la solución, cámbialo a "Resuelto"</p>
                                <p class="mb-0"><strong>Color del badge:</strong> Azul</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card border-success h-100">
                            <div class="card-header bg-success text-white">
                                <strong>Resuelto</strong>
                            </div>
                            <div class="card-body">
                                <p><strong>Qué significa:</strong> Has encontrado y aplicado una solución al problema</p>
                                <p><strong>Acción recomendada:</strong> Espera a que el usuario valide que el problema está solucionado. Si confirma, cambia a "Cerrado"</p>
                                <p class="mb-0"><strong>Color del badge:</strong> Verde</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card border-secondary h-100">
                            <div class="card-header bg-secondary text-white">
                                <strong>Cerrado</strong>
                            </div>
                            <div class="card-body">
                                <p><strong>Qué significa:</strong> El ticket está completamente finalizado y no requiere más atención</p>
                                <p><strong>Acción recomendada:</strong> Ninguna. El ticket puede reabrirse si el problema vuelve a ocurrir</p>
                                <p class="mb-0"><strong>Color del badge:</strong> Gris</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h4 class="mt-5"><i class="fas fa-exclamation-circle"></i> Niveles de Prioridad</h4>
                <p>La prioridad indica la urgencia del ticket:</p>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Prioridad</th>
                                <th>Cuándo usarla</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="badge bg-secondary">Baja</span></td>
                                <td>Consultas generales, mejoras no urgentes</td>
                            </tr>
                            <tr>
                                <td><span class="badge bg-info">Media</span></td>
                                <td>Problemas que afectan pero tienen solución temporal</td>
                            </tr>
                            <tr>
                                <td><span class="badge bg-warning text-dark">Alta</span></td>
                                <td>Problemas que impiden trabajar normalmente</td>
                            </tr>
                            <tr>
                                <td><span class="badge bg-danger">Crítica</span></td>
                                <td>Sistema completamente caído o problema de seguridad</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h4 class="mt-5"><i class="fas fa-bookmark"></i> Tipos de Tickets</h4>
                <p>Los tipos categorizan la naturaleza del ticket. Los tipos predeterminados más comunes son:</p>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="card text-center border-danger h-100">
                            <div class="card-body">
                                <i class="fas fa-bug fa-3x text-danger mb-2"></i>
                                <h6><strong>Bug</strong></h6>
                                <p class="small mb-0">Errores o fallos del sistema</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card text-center border-success h-100">
                            <div class="card-body">
                                <i class="fas fa-star fa-3x text-success mb-2"></i>
                                <h6><strong>Mejora</strong></h6>
                                <p class="small mb-0">Sugerencias de nuevas funcionalidades</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card text-center border-info h-100">
                            <div class="card-body">
                                <i class="fas fa-hand-paper fa-3x text-info mb-2"></i>
                                <h6><strong>Solicitud</strong></h6>
                                <p class="small mb-0">Peticiones de servicio específicas</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card text-center border-warning h-100">
                            <div class="card-body">
                                <i class="fas fa-question-circle fa-3x text-warning mb-2"></i>
                                <h6><strong>Consulta</strong></h6>
                                <p class="small mb-0">Preguntas o dudas</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> Los superadministradores pueden crear, editar o eliminar tipos desde la sección "Gestionar Tipos de Tickets" del menú.
                </div>
            </section>

            {{-- SECCIÓN: VER DETALLES --}}
            <section class="mb-5" id="detalles">
                <h3 class="text-primary border-bottom pb-2"><i class="fas fa-eye"></i> Ver Detalles de un Ticket</h3>

                <h4 class="mt-4">Cómo acceder</h4>
                <ol>
                    <li>En la lista de tickets, localiza el ticket que quieres revisar</li>
                    <li>En la columna "Acciones", haz clic en el botón <strong>azul con icono de ojo</strong></li>
                    <li>Se abrirá la pantalla completa de detalles del ticket</li>
                </ol>

                <h4 class="mt-4">Estructura de la Pantalla</h4>
                <p>La pantalla de detalles está dividida en <strong>dos columnas</strong>:</p>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card border-info h-100">
                            <div class="card-header bg-info text-white">
                                <strong><i class="fas fa-info-circle"></i> Columna Izquierda: Información del Ticket</strong>
                            </div>
                            <div class="card-body">
                                <div class="text-center mb-5 p-3 bg-light border rounded">
                                        <img src="/img/admin-ticket-details.png" class="img-fluid mt-3 border shadow-sm" alt="Tarjeta de eventos recientes">
                                        <p class="text-muted small mt-2">Ejemplo de panel de información de un ticket.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-primary h-100">
                            <div class="card-header bg-primary text-white">
                                <strong><i class="fas fa-edit"></i> Columna Derecha: Edición y Comentarios</strong>
                            </div>
                            <div class="card-body">
                                <div class="text-center mb-5 p-3 bg-light border rounded">
                                    <img src="/img/admin-ticket-edit-form.png" class="img-fluid mt-3 border shadow-sm" alt="Tarjeta de eventos recientes">
                                    <p class="text-muted small mt-2">Ejemplo de formulario de edición.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- SECCIÓN: EDITAR TICKET --}}
            <section class="mb-5" id="editar">
                <h3 class="text-success border-bottom pb-2"><i class="fas fa-edit"></i> Editar y Actualizar Tickets</h3>

                <h4 class="mt-4">Campos Editables en el Formulario</h4>
                <p>En la pestaña "Editar Ticket" encontrarás estos campos:</p>

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label"><strong>1. Título</strong></label>
                            <input type="text" class="form-control" value="No puedo acceder al sistema" disabled>
                            <small class="text-muted">Puedes corregir errores tipográficos o hacer el título más claro</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>2. Descripción</strong></label>
                            <textarea class="form-control" rows="3" disabled>Cuando intento iniciar sesión aparece un error...</textarea>
                            <small class="text-muted">Puedes ampliar con información técnica o notas internas</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>3. Estado</strong></label>
                            <select class="form-control" disabled>
                                <option>Nuevo</option>
                                <option>Pendiente</option>
                                <option selected>En Proceso</option>
                                <option>Resuelto</option>
                                <option>Cerrado</option>
                            </select>
                            <small class="text-muted">Actualiza según el progreso del ticket</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>4. Prioridad</strong></label>
                            <select class="form-control" disabled>
                                <option>Baja</option>
                                <option>Media</option>
                                <option selected>Alta</option>
                                <option>Crítica</option>
                            </select>
                            <small class="text-muted">Ajusta si la urgencia cambia después de revisar</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>5. Tipo</strong></label>
                            <select class="form-control" disabled>
                                <option selected>Bug</option>
                                <option>Mejora</option>
                                <option>Solicitud</option>
                                <option>Consulta</option>
                            </select>
                            <small class="text-muted">Cambia si el usuario eligió la categoría incorrecta</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>6. Asignado a</strong> <span class="badge bg-warning text-dark">Solo Superadmin</span></label>
                            <select class="form-control" disabled>
                                <option>Sin asignar</option>
                                <option>Admin Carlos</option>
                                <option selected>Admin María</option>
                                <option>Admin Pedro</option>
                            </select>
                            <small class="text-muted">Asigna o reasigna el ticket a otro administrador (solo superadministradores)</small>
                        </div>
                    </div>
                </div>

                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle"></i> <strong>Importante:</strong> El campo "Asignado a" solo aparece para superadministradores. Los administradores normales no pueden reasignar tickets.
                </div>

                <h4 class="mt-4">Proceso de Actualización</h4>
                <ol>
                    <li>Modifica los campos que necesites cambiar</li>
                    <li>Deja sin cambiar los que estén correctos</li>
                    <li>Haz clic en el botón verde <strong>"Guardar Cambios"</strong></li>
                    <li>El sistema actualiza la información inmediatamente</li>
                </ol>

                <div class="card border-success">
                    <div class="card-header bg-success text-white">
                        <i class="fas fa-check-circle"></i> Qué ocurre al guardar
                    </div>
                    <div class="card-body">
                        <ul class="mb-0">
                            <li>Se muestra un mensaje: <strong>"Ticket actualizado correctamente"</strong></li>
                            <li>El usuario recibe una <strong>notificación automática</strong> del cambio</li>
                            <li>Se registra un <strong>evento en el historial</strong> con tu nombre y la acción realizada</li>
                            <li>Eres redirigido a la lista de tickets</li>
                        </ul>
                    </div>
                </div>
            </section>

            {{-- SECCIÓN: COMENTARIOS --}}
            <section class="mb-5" id="comentarios">
                <h3 class="text-primary border-bottom pb-2"><i class="fas fa-comments"></i> Gestión de Comentarios</h3>

                <h4 class="mt-4">Acceder a los Comentarios</h4>
                <p>Desde la pantalla de detalles del ticket:</p>
                <ol>
                    <li>Localiza las pestañas en la parte superior de la columna derecha</li>
                    <li>Haz clic en la pestaña <strong>"Comentarios"</strong></li>
                    <li>Se mostrará una tabla con todos los comentarios del ticket</li>
                </ol>

                <h4 class="mt-4"><i class="fas fa-table"></i> Tabla de Comentarios</h4>
                <p>La tabla muestra todos los comentarios ordenados cronológicamente:</p>

                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead class="table-dark">
                            <tr>
                                <th>Autor</th>
                                <th>Mensaje</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Luis (Usuario)</td>
                                <td>He intentado reiniciar pero sigue sin funcionar</td>
                                <td>12/06/2025 10:30</td>
                                <td><button class="btn btn-sm btn-danger" disabled><i class="fas fa-trash"></i></button></td>
                            </tr>
                            <tr>
                                <td>Admin María</td>
                                <td>Revisando los logs del servidor...</td>
                                <td>12/06/2025 11:45</td>
                                <td><button class="btn btn-sm btn-danger" disabled><i class="fas fa-trash"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> <strong>Identificación del autor:</strong> Los comentarios muestran claramente si fueron escritos por un usuario o por un administrador, junto con su nombre.
                </div>

                <h4 class="mt-4"><i class="fas fa-plus-circle"></i> Añadir un Nuevo Comentario</h4>
                
                <p>Debajo de la tabla de comentarios encontrarás un formulario:</p>

                <div class="card">
                    <div class="card-header bg-light">
                        <strong>Añadir un comentario</strong>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-5 p-3 bg-light border rounded">
                            <img src="/img/admin-add-comment-form.png" class="img-fluid mt-3 border shadow-sm" alt="Tarjeta de eventos recientes">
                            <p class="text-muted small mt-2">Ejemplo de formulario para añadir comentarios.</p>
                        </div>
                    </div>
                </div>

                <p class="mt-3"><strong>Para añadir un comentario:</strong></p>
                <ol>
                    <li>Escribe tu mensaje en el cuadro de texto</li>
                    <li>Puedes escribir explicaciones técnicas, solicitar información adicional al usuario, o informar del progreso</li>
                    <li>Haz clic en el botón azul <strong>"Añadir Comentario"</strong></li>
                </ol>

                <div class="card border-success">
                    <div class="card-header bg-success text-white">
                        <i class="fas fa-check-circle"></i> Qué ocurre al añadir un comentario
                    </div>
                    <div class="card-body">
                        <ul class="mb-0">
                            <li>El comentario aparece inmediatamente en la tabla</li>
                            <li>El usuario recibe una <strong>notificación automática</strong></li>
                            <li>El contador de comentarios del ticket aumenta</li>
                            <li>Se registra en el historial de eventos</li>
                        </ul>
                    </div>
                </div>

                <h4 class="mt-4"><i class="fas fa-trash"></i> Eliminar Comentarios</h4>
                <p>Cada comentario tiene un botón rojo de papelera en la columna "Acciones".</p>
                
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle"></i> <strong>Importante:</strong> Solo puedes eliminar tus propios comentarios. No puedes eliminar comentarios de otros administradores ni de usuarios (a menos que seas superadministrador con permisos especiales).
                </div>

                <p><strong>Para eliminar:</strong></p>
                <ol>
                    <li>Haz clic en el botón rojo de papelera</li>
                    <li>Confirma la eliminación en el mensaje emergente</li>
                    <li>El comentario desaparecerá permanentemente</li>
                </ol>
            </section>

            {{-- SECCIÓN: ASIGNAR TICKETS --}}
            <section class="mb-5" id="asignar">
                <h3 class="text-danger border-bottom pb-2"><i class="fas fa-user-tag"></i> Asignar Tickets a Administradores</h3>

                <div class="alert alert-danger">
                    <i class="fas fa-lock"></i> <strong>Solo Superadministradores:</strong> Esta funcionalidad solo está disponible para superadministradores. Los administradores normales no pueden asignar ni reasignar tickets.
                </div>

                <h4 class="mt-4">¿Qué significa asignar un ticket?</h4>
                <p>Asignar un ticket significa designar a un administrador específico como responsable de resolver ese ticket. El administrador asignado:</p>
                <ul>
                    <li>Verá el ticket en su lista de "Mis Tickets"</li>
                    <li>Recibirá notificaciones sobre cambios en ese ticket</li>
                    <li>Será el responsable de actualizarlo y resolverlo</li>
                </ul>

                <h4 class="mt-4">Cómo Asignar un Ticket</h4>

                <div class="card mb-3">
                    <div class="card-header bg-info text-white">
                        <strong>Método 1: Desde el formulario de edición</strong>
                    </div>
                    <div class="card-body">
                        <ol>
                            <li>Abre los detalles del ticket</li>
                            <li>En la pestaña "Editar Ticket", busca el campo <strong>"Asignado a"</strong></li>
                            <li>Abre el menú desplegable</li>
                            <li>Selecciona el administrador al que quieres asignar el ticket</li>
                            <li>Haz clic en <strong>"Guardar Cambios"</strong></li>
                        </ol>

                        <div class="alert alert-success mt-2 mb-0">
                            <i class="fas fa-check"></i> El administrador seleccionado recibirá una notificación automática de que tiene un nuevo ticket asignado.
                        </div>
                    </div>
                </div>

                <h4 class="mt-4">Reasignar un Ticket</h4>
                <p>Puedes cambiar la asignación de un ticket en cualquier momento:</p>

                <div class="card border-info">
                    <div class="card-body">
                        <p><strong>Casos comunes para reasignar:</strong></p>
                        <ul>
                            <li>El administrador asignado está de vacaciones</li>
                            <li>El ticket requiere conocimientos especializados de otro administrador</li>
                            <li>Un administrador tiene demasiada carga de trabajo</li>
                            <li>El tipo de problema cambió y corresponde a otra área</li>
                        </ul>
                        <p class="mb-0"><strong>Proceso:</strong> Simplemente cambia la selección en el campo "Asignado a" y guarda. Ambos administradores recibirán notificaciones del cambio.</p>
                    </div>
                </div>
            </section>

            {{-- SECCIÓN: TICKETS ASIGNADOS --}}
            <section class="mb-5" id="asignados">
                <h3 class="text-info border-bottom pb-2"><i class="fas fa-user-check"></i> Ver Tus Tickets Asignados</h3>

                <p>Todos los administradores (tanto normales como superadministradores) tienen acceso a una vista filtrada con <strong>solo sus tickets asignados</strong>.</p>

                <h4 class="mt-4">Cómo acceder</h4>
                <p>Mediante el menú lateral izquierdo en la opción <strong>{{ __('general.admin_sidebar.gestionar_tickets') }}</strong>, en la opción 
                    de <strong>{{ __('general.admin_sidebar.tickets_asignados') }} </strong>
                </p>

                <h4 class="mt-4">Qué muestra esta vista</h4>
                <p>Esta pantalla es idéntica a la lista general de tickets, pero <strong>filtrada automáticamente</strong> para mostrar solo los tickets donde tú apareces en el campo "Asignado a".</p>

                <div class="card border-info">
                    <div class="card-header bg-info text-white">
                        <strong>Ventajas de esta vista</strong>
                    </div>
                    <div class="card-body">
                        <ul class="mb-0">
                            <li>No te distrae con tickets de otros administradores</li>
                            <li>Puedes enfocarte solo en tu carga de trabajo</li>
                            <li>Ideal para el día a día de un administrador normal</li>
                            <li>Muestra resumen en la parte superior: total asignados, resueltos, pendientes</li>
                        </ul>
                    </div>
                </div>

                <h4 class="mt-4">Tarjetas Resumen (Solo en "Mis Tickets")</h4>
                <p>En la parte superior de esta vista verás 3 tarjetas de colores:</p>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card border-info text-center">
                            <div class="card-body">
                                <h1 class="text-info mb-2">8</h1>
                                <p class="mb-0"><strong>Tickets Totales Asignados</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-success text-center">
                            <div class="card-body">
                                <h1 class="text-success mb-2">5</h1>
                                <p class="mb-0"><strong>Tickets Resueltos</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-warning text-center">
                            <div class="card-body">
                                <h1 class="text-warning mb-2">3</h1>
                                <p class="mb-0"><strong>Tickets Pendientes</strong></p>
                            </div>
                        </div>
                    </div>
                </div>

                <p class="mt-3">Estas tarjetas te ayudan a visualizar rápidamente tu rendimiento y carga de trabajo actual.</p>
            </section>

            {{-- SECCIÓN: FLUJO DE TRABAJO --}}
            <section class="mb-5">
                <h3 class="text-primary border-bottom pb-2"><i class="fas fa-project-diagram"></i> Flujo de Trabajo Completo</h3>
                <p>Este es el proceso típico desde que llega un ticket hasta que se cierra:</p>

                <div class="timeline">
                    <div class="card mb-3 border-primary">
                        <div class="card-header bg-primary text-white">
                            <strong>Fase 1:</strong> Ticket Nuevo Creado
                        </div>
                        <div class="card-body">
                            <p><strong>Estado:</strong> <span class="badge bg-primary">Nuevo</span></p>
                            <p><strong>Qué hacer:</strong></p>
                            <ol class="mb-0">
                                <li>Recibes notificación de nuevo ticket</li>
                                <li>Revisas el título y descripción</li>
                                <li>Verificas el tipo y prioridad (corriges si el usuario se equivocó)</li>
                                <li><strong>Si eres superadmin:</strong> Asignas a un administrador</li>
                                <li><strong>Si eres admin normal y te lo asignaron:</strong> Cambias estado a "Pendiente"</li>
                            </ol>
                        </div>
                    </div>

                    <div class="card mb-3 border-warning">
                        <div class="card-header bg-warning text-dark">
                            <strong>Fase 2:</strong> Pendiente → En Proceso
                        </div>
                        <div class="card-body">
                            <p><strong>Estado:</strong> <span class="badge bg-warning text-dark">Pendiente</span> → <span class="badge bg-info">En Proceso</span></p>
                            <p><strong>Qué hacer:</strong></p>
                            <ol class="mb-0">
                                <li>Cuando comiences a trabajar en el ticket, cámbialo a "En Proceso"</li>
                                <li>Añade un comentario inicial: "Estoy revisando el problema..."</li>
                                <li>Si necesitas más información, pregúntale al usuario mediante comentario</li>
                                <li>Investiga y trabaja en la solución</li>
                            </ol>
                        </div>
                    </div>

                    <div class="card mb-3 border-success">
                        <div class="card-header bg-success text-white">
                            <strong>Fase 3:</strong> Resolución
                        </div>
                        <div class="card-body">
                            <p><strong>Estado:</strong> <span class="badge bg-success">Resuelto</span></p>
                            <p><strong>Qué hacer:</strong></p>
                            <ol class="mb-0">
                                <li>Cuando tengas la solución, cambia el estado a "Resuelto"</li>
                                <li>Añade un comentario explicando la solución aplicada</li>
                                <li>Ejemplo: "He restablecido tu contraseña. Intenta acceder nuevamente"</li>
                                <li>Espera a que el usuario confirme que el problema está solucionado</li>
                            </ol>
                        </div>
                    </div>

                    <div class="card mb-3 border-secondary">
                        <div class="card-header bg-secondary text-white">
                            <strong>Fase 4:</strong> Cierre del Ticket
                        </div>
                        <div class="card-body">
                            <p><strong>Estado:</strong> <span class="badge bg-secondary">Cerrado</span></p>
                            <p><strong>Qué hacer:</strong></p>
                            <ol>
                                <li>Una vez el usuario confirma que está resuelto, cambia a "Cerrado"</li>
                                <li>Añade un comentario final (opcional): "Ticket cerrado satisfactoriamente"</li>
                                <li>Guarda los cambios</li>
                            </ol>
                            <div class="alert alert-info mb-0">
                                <i class="fas fa-info-circle"></i> Un ticket cerrado puede reabrirse si el problema vuelve a ocurrir. Simplemente cambia el estado nuevamente a "En Proceso" o "Pendiente".
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- SECCIÓN: BUENAS PRÁCTICAS --}}
            <section class="mb-5">
                <h3 class="text-primary border-bottom pb-2"><i class="fas fa-thumbs-up"></i> Buenas Prácticas</h3>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card border-success h-100">
                            <div class="card-header bg-success text-white">
                                <h5 class="mb-0"><i class="fas fa-check"></i> Haz Esto</h5>
                            </div>
                            <div class="card-body">
                                <ul>
                                    <li><strong>Actualiza el estado frecuentemente</strong> para que los usuarios sepan que estás trabajando en ello</li>
                                    <li><strong>Añade comentarios claros</strong> explicando qué estás haciendo</li>
                                    <li><strong>Corrige la prioridad</strong> si el usuario la puso incorrecta</li>
                                    <li><strong>Cambia el tipo</strong> si no corresponde con la descripción</li>
                                    <li><strong>Pide información adicional</strong> mediante comentarios si no entiendes el problema</li>
                                    <li><strong>Cierra tickets resueltos</strong> para mantener la lista limpia</li>
                                    <li><strong>Revisa tickets antiguos</strong> pendientes periódicamente</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-danger h-100">
                            <div class="card-header bg-danger text-white">
                                <h5 class="mb-0"><i class="fas fa-times"></i> Evita Esto</h5>
                            </div>
                            <div class="card-body">
                                <ul>
                                    <li><strong>No dejes tickets en "Nuevo"</strong> más de 24 horas</li>
                                    <li><strong>No cambies a "Resuelto"</strong> sin explicar la solución en un comentario</li>
                                    <li><strong>No cierres tickets</strong> sin que el usuario confirme</li>
                                    <li><strong>No cambies tipo/prioridad</strong> sin razón válida</li>
                                    <li><strong>No ignores comentarios</strong> de los usuarios</li>
                                    <li><strong>No asignes todo a la misma persona</strong> (crea sobrecarga)</li>
                                    <li><strong>No elimines comentarios</strong> importantes del historial</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="alert alert-success mt-3">
                    <h5><i class="fas fa-lightbulb"></i> Consejo Profesional</h5>
                    <p class="mb-0">Mantén una comunicación clara y constante con el usuario. Un ticket bien documentado con comentarios regulares genera confianza y reduce malentendidos. Aunque tardes más en resolver el problema, el usuario valorará estar informado del progreso.</p>
                </div>
            </section>


            {{-- SECCIÓN: TIPOS DE TICKETS (CONFIGURACIÓN) --}}
            <section class="mb-5" id="config-tipos">
                <h3 class="text-danger border-bottom pb-2"><i class="fas fa-cog"></i> Gestionar Tipos de Tickets (Solo Superadmin)</h3>

                <div class="alert alert-danger">
                    <i class="fas fa-lock"></i> <strong>Solo Superadministradores:</strong> Esta funcionalidad avanzada solo está disponible para cuentas con permisos de superadministrador.
                </div>

                <p>Los tipos de tickets son las categorías que los usuarios pueden seleccionar al crear un ticket. Puedes personalizarlas según las necesidades de tu organización.</p>

                <h4 class="mt-4">Acceso</h4>
                <ol>
                    <li>Menú lateral → <strong>"Tipos"</strong></li>
                    <li>Click en <strong>"Gestionar Tipos de Tickets"</strong></li>
                </ol>

                <h4 class="mt-4">Operaciones Disponibles</h4>

                <div class="card mb-3 border-success">
                    <div class="card-header bg-success text-white">
                        <i class="fas fa-plus-circle"></i> Crear Nuevo Tipo
                    </div>
                    <div class="card-body">
                        <ol>
                            <li>Haz clic en el botón verde <strong>"Crear Nuevo Tipo"</strong></li>
                            <li>Rellena el formulario:
                                <ul>
                                    <li><strong>Nombre:</strong> Ej: "Problema de Red", "Error de Facturación"</li>
                                    <li><strong>Descripción (opcional):</strong> Explicación de cuándo usar este tipo</li>
                                </ul>
                            </li>
                            <li>Haz clic en "Guardar"</li>
                            <li>El nuevo tipo aparecerá en los formularios de creación/edición de tickets</li>
                        </ol>
                    </div>
                </div>

                <div class="card mb-3 border-warning">
                    <div class="card-header bg-warning text-dark">
                        <i class="fas fa-edit"></i> Editar Tipo Existente
                    </div>
                    <div class="card-body">
                        <ol class="mb-0">
                            <li>En la lista de tipos, haz clic en el botón amarillo "Editar"</li>
                            <li>Modifica el nombre o descripción</li>
                            <li>Guarda los cambios</li>
                            <li>Todos los tickets con ese tipo se actualizarán automáticamente</li>
                        </ol>
                    </div>
                </div>

                <div class="card border-danger">
                    <div class="card-header bg-danger text-white">
                        <i class="fas fa-trash"></i> Eliminar Tipo
                    </div>
                    <div class="card-body">
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-triangle"></i> <strong>¡PRECAUCIÓN!</strong> No elimines un tipo si hay tickets usándolo actualmente.
                        </div>
                        <ol class="mb-0">
                            <li>Verifica que no haya tickets con ese tipo (usa el filtro)</li>
                            <li>Si hay tickets, primero cámbialos a otro tipo</li>
                            <li>Luego haz clic en el botón rojo "Eliminar"</li>
                            <li>Confirma la eliminación</li>
                        </ol>
                    </div>
                </div>
            </section>

            

            {{-- SECCIÓN: EJEMPLO COMPLETO --}}
            <section class="mb-5">
                <h3 class="text-dark border-bottom pb-2 mb-3"><i class="fas fa-play-circle mr-2"></i> Ejemplo Completo</h3>

                <div class="card card-outline card-navy">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Escenario:</strong> Usuario reporta que no puede iniciar sesión</h3>
                    </div>
                    <div class="card-body">
                         <div class="timeline">
                            <!-- Time Label -->
                            <div class="time-label">
                                <span class="bg-navy">Día 1</span>
                            </div>

                            <!-- 9:00 AM -->
                            <div>
                                <i class="fas fa-user bg-primary"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i> 9:00 AM</span>
                                    <h3 class="timeline-header"><a href="#">Usuario</a> crea el ticket</h3>
                                    <div class="timeline-body">
                                        <p><strong>Título:</strong> "No puedo entrar"</p>
                                        <p><strong>Descripción:</strong> "Me sale un error cuando pongo mi contraseña"</p>
                                        <hr>
                                        <span class="badge bg-primary">Nuevo</span> <span class="badge bg-warning">Prioridad Media</span>
                                    </div>
                                </div>
                            </div>

                            <!-- 9:15 AM -->
                            <div>
                                <i class="fas fa-user-shield bg-info"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i> 9:15 AM</span>
                                    <h3 class="timeline-header"><a href="#">Tú (Superadmin)</a> revisas el ticket</h3>
                                    <div class="timeline-body">
                                        Acciones realizadas:
                                        <ul>
                                            <li>Corrección de título a: "Error al iniciar sesión"</li>
                                            <li>Cambio de prioridad a <span class="text-danger font-weight-bold">Alta</span></li>
                                            <li>Verificación de tipo: "Bug"</li>
                                            <li>Asignación a <strong>Admin Carlos</strong></li>
                                            <li>Cambio de estado a <span class="badge bg-warning">Pendiente</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                             <!-- 9:30 AM -->
                             <div>
                                <i class="fas fa-user-cog bg-warning"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i> 9:30 AM</span>
                                    <h3 class="timeline-header"><a href="#">Admin Carlos</a> recibe asignación</h3>
                                    <div class="timeline-body">
                                        <ol>
                                            <li>Recibe notificación #45</li>
                                            <li>Cambia estado a <span class="badge bg-info">En Proceso</span></li>
                                            <li>Comentario: <em>"Hola, estoy revisando tu cuenta. ¿Qué mensaje de error aparece exactamente?"</em></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                             <!-- 10:15 AM -->
                             <div>
                                <i class="fas fa-comment bg-secondary"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i> 10:15 AM</span>
                                    <h3 class="timeline-header"><a href="#">Usuario</a> responde</h3>
                                    <div class="timeline-body">
                                        <em>"Dice 'Contraseña incorrecta' pero estoy seguro de que es la correcta"</em>
                                    </div>
                                </div>
                            </div>

                             <!-- 10:45 AM -->
                             <div>
                                <i class="fas fa-check bg-success"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i> 10:45 AM</span>
                                    <h3 class="timeline-header"><a href="#">Admin Carlos</a> resuelve el problema</h3>
                                    <div class="timeline-body">
                                        Detectada cuenta bloqueada.
                                        <br>
                                        <strong>Acción:</strong> Desbloqueo y cambio de estado a <span class="badge bg-success">Resuelto</span>.
                                        <br>
                                        <strong>Comentario:</strong> <em>"He desbloqueado tu cuenta. Intenta acceder nuevamente..."</em>
                                    </div>
                                </div>
                            </div>

                             <!-- 11:30 AM -->
                             <div>
                                <i class="fas fa-flag-checkered bg-dark"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i> 11:30 AM</span>
                                    <h3 class="timeline-header"><a href="#">Cierre</a> del Ticket</h3>
                                    <div class="timeline-body">
                                        Usuario confirma: <em>"¡Funciona! Muchas gracias"</em>
                                        <br>
                                        Carlos cierra el ticket.
                                        <div class="mt-2">
                                            <span class="badge bg-secondary">Cerrado</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
@endsection
