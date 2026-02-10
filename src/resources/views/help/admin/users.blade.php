@extends('layouts.admin')

@section('title', 'Documentación - Gestión de Usuarios')

@section('admincontent')
<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0"><i class="fas fa-users"></i> Gestión de Usuarios y Administradores</h2>
            <p class="mb-0 mt-2">Guía completa para administrar cuentas de usuarios y administradores del sistema</p>
        </div>
        <div class="card-body">
            
            {{-- Índice de contenido --}}
            <section class="mb-5">
                <div class="alert alert-info">
                    <h5><i class="fas fa-list"></i> En esta guía aprenderás:</h5>
                    <ul class="mb-0">
                        <li><a href="#usuarios">Gestión de Usuarios Normales</a></li>
                        <li><a href="#administradores">Gestión de Administradores (solo superadmin)</a></li>
                        <li><a href="#permisos">Diferencias de permisos</a></li>
                        <li><a href="#buenas-practicas">Buenas prácticas</a></li>
                    </ul>
                </div>
            </section>

            {{-- SECCIÓN: GESTIÓN DE USUARIOS --}}
            <section class="mb-5" id="usuarios">
                <h3 class="text-primary border-bottom pb-2"><i class="fas fa-user"></i> Gestión de Usuarios Normales</h3>
                <p class="lead">Los usuarios normales son las personas que pueden crear tickets y consultar el estado de sus solicitudes. Como administrador, puedes gestionar sus cuentas desde el panel de administración.</p>

                {{-- Acceso a la gestión de usuarios --}}
                <h4 class="mt-4"><i class="fas fa-door-open"></i> Cómo acceder</h4>
                <p>Para acceder a la gestión de usuarios:</p>
                <ol>
                    <li>Desde el menú lateral izquierdo, busca la sección <strong>"Administrar todos los usuarios"</strong></li>
                    <li>Haz clic en <strong>"Administrar usuarios"</strong></li>
                    <li>Se abrirá la pantalla principal con la lista de todos los usuarios registrados</li>
                </ol>

                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle"></i> <strong>Importante:</strong> Esta funcionalidad solo está disponible para <strong>superadministradores</strong>. Los administradores normales no pueden gestionar usuarios.
                </div>

                {{-- La pantalla de lista de usuarios --}}
                <h4 class="mt-4"><i class="fas fa-table"></i> La Pantalla de Lista de Usuarios</h4>
                <p>Cuando accedes a esta sección, verás una tabla completa con todos los usuarios del sistema:</p>

                <div class="card mb-3">
                    <div class="card-header bg-light">
                        <strong>Columnas de la tabla</strong>
                    </div>
                    <div class="card-body">
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
                                        <td>Identificador único del usuario</td>
                                        <td>Referencia técnica del usuario en el sistema</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Nombre</strong></td>
                                        <td>Nombre completo del usuario</td>
                                        <td>Identificar visualmente al usuario</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Email</strong></td>
                                        <td>Correo electrónico de acceso</td>
                                        <td>Contacto y credencial de inicio de sesión</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Fecha de Creación</strong></td>
                                        <td>Cuándo se registró el usuario</td>
                                        <td>Saber la antigüedad de la cuenta</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Acciones</strong></td>
                                        <td>Botones de gestión</td>
                                        <td>Editar o eliminar el usuario</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Herramientas de la tabla --}}
                <h4 class="mt-4"><i class="fas fa-tools"></i> Herramientas de la Tabla</h4>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="card h-100 border-info">
                            <div class="card-header bg-info text-white">
                                <i class="fas fa-search"></i> Búsqueda
                            </div>
                            <div class="card-body">
                                <p>En la esquina superior derecha encontrarás un campo de búsqueda.</p>
                                <p><strong>Cómo usarlo:</strong></p>
                                <ul>
                                    <li>Escribe el nombre o email del usuario que buscas</li>
                                    <li>La tabla filtra automáticamente mientras escribes</li>
                                    <li>Borra el texto para ver todos los usuarios nuevamente</li>
                                </ul>
                                <p class="mb-0"><strong>Ejemplo:</strong> Escribe "maría" para encontrar a María González o maria@example.com</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card h-100 border-success">
                            <div class="card-header bg-success text-white">
                                <i class="fas fa-sort"></i> Ordenación
                            </div>
                            <div class="card-body">
                                <p>Haz clic en cualquier encabezado de columna para ordenar:</p>
                                <p><strong>Opciones:</strong></p>
                                <ul>
                                    <li><strong>Primer clic:</strong> Orden ascendente (A→Z, 1→9)</li>
                                    <li><strong>Segundo clic:</strong> Orden descendente (Z→A, 9→1)</li>
                                    <li><strong>Indicador:</strong> Flecha que muestra el orden actual</li>
                                </ul>
                                <p class="mb-0"><strong>Útil para:</strong> Ordenar por fecha de creación para ver los usuarios más nuevos</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="card border-warning">
                        <div class="card-header bg-warning text-dark">
                            <i class="fas fa-list-ol"></i> Paginación y Registros por Página
                        </div>
                        <div class="card-body">
                            <p><strong>Selector "Mostrar [número] registros":</strong></p>
                            <ul>
                                <li>Ubicado en la esquina superior izquierda</li>
                                <li>Opciones: 10, 25, 50 o 100 usuarios por página</li>
                                <li>Por defecto muestra 10</li>
                            </ul>
                            <p><strong>Controles de paginación:</strong></p>
                            <ul class="mb-0">
                                <li>En la parte inferior de la tabla</li>
                                <li>Botones: "Anterior", números de página, "Siguiente"</li>
                                <li>Indicador: "Mostrando 1 a 10 de 45 registros"</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- CREAR NUEVO USUARIO --}}
                <h4 class="mt-5 text-success"><i class="fas fa-user-plus"></i> Crear Nuevo Usuario</h4>
                
                <h5 class="mt-3">Paso 1: Acceder al formulario de creación</h5>
                <p>En la pantalla de lista de usuarios, en la parte superior derecha, encontrarás un botón verde:</p>
                <div class="text-center my-3">
                    <div class="text-center mb-5 p-3 bg-light border rounded">
                            <img src="/img/create-user-button.png" class="img-fluid mt-3 border shadow-sm" alt="Tarjeta de eventos recientes">
                            <p class="text-muted small mt-2">Boton para crear un usuario.</p>
                    </div>
                </div>
                <p>Haz clic en él para abrir el formulario de creación.</p>

                <h5 class="mt-4">Paso 2: Rellenar el formulario</h5>
                <p>El formulario de creación de usuario contiene los siguientes campos:</p>

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label"><strong>Nombre completo</strong> <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Ej: Juan Pérez García" disabled>
                            <small class="text-muted">El nombre que verá el usuario en su perfil y que verás tú en la lista.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>Correo electrónico</strong> <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" placeholder="Ej: juan.perez@empresa.com" disabled>
                            <small class="text-muted">Será su nombre de usuario para iniciar sesión. Debe ser único en el sistema.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>Contraseña</strong> <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" placeholder="Mínimo 8 caracteres" disabled>
                            <small class="text-muted">Debe tener al menos 8 caracteres. El usuario podrá cambiarla después.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>Confirmar contraseña</strong> <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" placeholder="Repite la contraseña" disabled>
                            <small class="text-muted">Escribe la misma contraseña para confirmar que no hay errores.</small>
                        </div>

                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i> Los campos marcados con <span class="text-danger">*</span> son obligatorios. El formulario no se enviará si faltan.
                        </div>
                    </div>
                </div>

                <h5 class="mt-4">Paso 3: Guardar el usuario</h5>
                <p>Una vez completado el formulario correctamente:</p>
                <ol>
                    <li>Revisa que todos los datos sean correctos</li>
                    <li>Haz clic en el botón verde <strong>"Crear Usuario"</strong> al final del formulario</li>
                    <li>El sistema validará los datos automáticamente</li>
                </ol>

                <div class="card border-success mb-3">
                    <div class="card-header bg-success text-white">
                        <i class="fas fa-check-circle"></i> Si todo es correcto
                    </div>
                    <div class="card-body">
                        <p>Verás un mensaje de éxito en la parte superior:</p>
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle"></i> Usuario creado exitosamente
                        </div>
                        <p class="mb-0">Serás redirigido a la lista de usuarios y el nuevo usuario aparecerá en la tabla.</p>
                    </div>
                </div>

                <div class="card border-danger">
                    <div class="card-header bg-danger text-white">
                        <i class="fas fa-exclamation-triangle"></i> Si hay errores
                    </div>
                    <div class="card-body">
                        <p>El sistema mostrará mensajes de error específicos debajo de cada campo con problema:</p>
                        <ul>
                            <li><strong>"El campo nombre es obligatorio"</strong> - Falta rellenar el nombre</li>
                            <li><strong>"El email ya está registrado"</strong> - Ese correo ya existe en el sistema</li>
                            <li><strong>"Las contraseñas no coinciden"</strong> - La contraseña y confirmación son diferentes</li>
                            <li><strong>"La contraseña debe tener al menos 8 caracteres"</strong> - Contraseña muy corta</li>
                        </ul>
                        <p class="mb-0">Corrige los errores indicados y vuelve a hacer clic en "Crear Usuario".</p>
                    </div>
                </div>

                {{-- EDITAR USUARIO --}}
                <h4 class="mt-5 text-warning"><i class="fas fa-user-edit"></i> Editar Usuario Existente</h4>
                
                <h5 class="mt-3">Cuándo editar un usuario</h5>
                <p>Puedes necesitar editar un usuario cuando:</p>
                <ul>
                    <li>El usuario cambió de nombre (por ejemplo, por matrimonio)</li>
                    <li>El correo electrónico ya no es válido y necesita actualizarse</li>
                    <li>El usuario olvidó su contraseña y necesitas restablecerla</li>
                    <li>Hay errores tipográficos en los datos del usuario</li>
                </ul>

                <h5 class="mt-4">Paso 1: Localizar el usuario</h5>
                <ol>
                    <li>En la lista de usuarios, busca al usuario que quieres editar (usa la búsqueda si es necesario)</li>
                    <li>En la columna "Acciones" de esa fila, verás dos botones</li>
                    <li>Haz clic en el botón <strong>amarillo con icono de lápiz</strong> (Editar)</li>
                </ol>

                <div class="text-center my-3">
                    <div class="text-center mb-5 p-3 bg-light border rounded">
                            <img src="/img/admin-users-action-buttons.png" class="img-fluid mt-3 border shadow-sm" alt="Tarjeta de eventos recientes">
                            <p class="text-muted small mt-2">Sección de botones de acción para usuarios, <strong>editar (amarillo)</strong> y eliminar(rojo).</p>
                    </div>
                </div>

                <h5 class="mt-4">Paso 2: Modificar los datos</h5>
                <p>Se abrirá un formulario pre-rellenado con los datos actuales del usuario. Puedes modificar:</p>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Campo</th>
                                <th>¿Puedes cambiarlo?</th>
                                <th>Consideraciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Nombre</strong></td>
                                <td><span class="badge bg-success">Sí</span></td>
                                <td>Sin restricciones</td>
                            </tr>
                            <tr>
                                <td><strong>Email</strong></td>
                                <td><span class="badge bg-success">Sí</span></td>
                                <td>Debe ser único (no usado por otro usuario)</td>
                            </tr>
                            <tr>
                                <td><strong>Contraseña</strong></td>
                                <td><span class="badge bg-warning text-dark">Opcional</span></td>
                                <td>Déjala en blanco si NO quieres cambiarla. Rellenala solo si quieres establecer una nueva.</td>
                            </tr>
                            <tr>
                                <td><strong>Confirmar contraseña</strong></td>
                                <td><span class="badge bg-warning text-dark">Opcional</span></td>
                                <td>Solo si cambias la contraseña</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle"></i> <strong>Importante sobre la contraseña:</strong> Si dejas los campos de contraseña en blanco, la contraseña actual del usuario NO se modificará. Solo rellena estos campos si quieres cambiarla.
                </div>

                <h5 class="mt-4">Paso 3: Guardar los cambios</h5>
                <ol>
                    <li>Revisa que todos los cambios sean correctos</li>
                    <li>Haz clic en el botón <strong>"Actualizar Usuario"</strong></li>
                    <li>Si todo es correcto, verás un mensaje de éxito y serás redirigido a la lista</li>
                </ol>

                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> Usuario actualizado correctamente
                </div>

                {{-- ELIMINAR USUARIO --}}
                <h4 class="mt-5 text-danger"><i class="fas fa-user-times"></i> Eliminar Usuario</h4>

                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle"></i> <strong>¡PRECAUCIÓN!</strong> Eliminar un usuario es una acción <strong>permanente e irreversible</strong>. Todos los datos del usuario se perderán.
                </div>

                <h5 class="mt-3">Cuándo eliminar un usuario</h5>
                <p>Solo deberías eliminar un usuario cuando:</p>
                <ul>
                    <li>El usuario ha dejado la organización y ya no necesita acceso</li>
                    <li>Se creó una cuenta de prueba que ya no se necesita</li>
                    <li>Se detectó una cuenta duplicada por error</li>
                    <li>El usuario lo solicita expresamente (derecho al olvido)</li>
                </ul>

                <div class="alert alert-warning">
                    <i class="fas fa-info-circle"></i> <strong>Nota:</strong> Al eliminar un usuario, todos sus tickets permanecerán en el sistema pero quedarán huérfanos (sin propietario visible). Esto es intencional para mantener el historial.
                </div>

                <h5 class="mt-4">Paso 1: Solicitar confirmación</h5>
                <ol>
                    <li>En la lista de usuarios, localiza al usuario que quieres eliminar</li>
                    <li>En la columna "Acciones", haz clic en el botón <strong>rojo con icono de papelera</strong></li>
                </ol>

                <div class="text-center my-3">
                    <div class="text-center mb-5 p-3 bg-light border rounded">
                        <img src="/img/admin-users-action-buttons.png" class="img-fluid mt-3 border shadow-sm" alt="Tarjeta de eventos recientes">
                        <p class="text-muted small mt-2">Sección de botones de acción para usuarios, editar (amarillo) y <strong>eliminar(rojo)</strong>.</p>
                    </div>
                </div>

                <h5 class="mt-4">Paso 2: Pantalla de confirmación</h5>
                <p>Se abrirá una nueva pantalla con un mensaje de advertencia claro:</p>

                <div class="card border-danger">
                    <div class="text-center mb-5 p-3 bg-light border rounded">
                            <img src="/img/confirm-deleteluser-modal.png" class="img-fluid mt-3 border shadow-sm" alt="Tarjeta de eventos recientes">
                            <p class="text-muted small mt-2">Modal de confirmación de eliminación de usuario.</p>
                    </div>
                </div>

                <h5 class="mt-4">Paso 3: Confirmar o cancelar</h5>
                <ul>
                    <li><strong>Si haces clic en "Cancelar":</strong> Volverás a la lista sin eliminar nada</li>
                    <li><strong>Si haces clic en "Sí, eliminar usuario":</strong> El usuario será eliminado permanentemente</li>
                </ul>

                <p>Si confirmas la eliminación, verás un mensaje:</p>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> Usuario eliminado correctamente
                </div>
            </section>

            {{-- SECCIÓN: GESTIÓN DE ADMINISTRADORES --}}
            <section class="mb-5" id="administradores">
                <h3 class="text-danger border-bottom pb-2"><i class="fas fa-user-shield"></i> Gestión de Administradores (Solo Superadministrador)</h3>
                
                <div class="alert alert-danger">
                    <i class="fas fa-lock"></i> <strong>Acceso restringido:</strong> Solo los <strong>superadministradores</strong> pueden acceder a esta funcionalidad. Los administradores normales no verán esta opción en el menú.
                </div>

                <p class="lead">Los administradores son usuarios con permisos especiales que pueden gestionar tickets, usuarios, y el sistema en general. La gestión de administradores funciona de forma muy similar a la gestión de usuarios, pero con algunas diferencias clave.</p>

                {{-- Acceso --}}
                <h4 class="mt-4"><i class="fas fa-door-open"></i> Cómo acceder</h4>
                <ol>
                    <li>Desde el menú lateral izquierdo, busca la sección <strong>"Administrar todos los usuarios"</strong></li>
                    <li>Haz clic en <strong>"Administrar admins"</strong></li>
                    <li>Se abrirá la pantalla con la lista de administradores</li>
                </ol>

                <div class="card-body">
                    <div class="text-center mb-5 p-3 bg-light border rounded">
                    <img src="/img/admins-table.png" class="img-fluid mt-3 border shadow-sm" alt="Tarjeta de eventos recientes">
                    <p class="text-muted small mt-2">Ejemplo de tabla de administradores.</p>
                </div>

                {{-- Diferencias con usuarios normales --}}
                <h4 class="mt-4"><i class="fas fa-not-equal"></i> Diferencias con la Gestión de Usuarios</h4>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Característica</th>
                                <th>Usuarios Normales</th>
                                <th>Administradores</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Acceso al sistema</strong></td>
                                <td>Panel de usuario (/user)</td>
                                <td>Panel de administración (/admin)</td>
                            </tr>
                            <tr>
                                <td><strong>Pueden crear tickets</strong></td>
                                <td><span class="badge bg-success">Sí</span></td>
                                <td><span class="badge bg-danger">No</span></td>
                            </tr>
                            <tr>
                                <td><strong>Pueden gestionar tickets</strong></td>
                                <td><span class="badge bg-danger">No</span></td>
                                <td><span class="badge bg-success">Sí</span></td>
                            </tr>
                            <tr>
                                <td><strong>Campo adicional en formulario</strong></td>
                                <td>Ninguno</td>
                                <td>Checkbox "¿Es superadministrador?"</td>
                            </tr>
                            <tr>
                                <td><strong>Cantidad recomendada</strong></td>
                                <td>Ilimitada (según necesidad)</td>
                                <td>Limitada (solo personal de soporte)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- Campo especial: Es superadministrador --}}
                <h4 class="mt-4"><i class="fas fa-crown"></i> Campo Especial: "¿Es Superadministrador?"</h4>
                
                <p>Al crear o editar un administrador, verás un campo adicional que NO existe para usuarios normales:</p>

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="text-center mb-5 p-3 bg-light border rounded">
                            <img src="/img/superAdmin-option.png" class="img-fluid mt-3 border shadow-sm" alt="Tarjeta de eventos recientes">
                            <p class="text-muted small mt-2">Opción de "¿Es superadministrador?" en el formulario de administrador.</p>
                    </div>
                        
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card border-info h-100">
                            <div class="card-header bg-info text-white">
                                <strong>Si NO marcas la casilla</strong>
                            </div>
                            <div class="card-body">
                                <p><strong>El administrador será "normal" y podrá:</strong></p>
                                <ul class="mb-0">
                                    <li>Ver tickets asignados a él</li>
                                    <li>Comentar en tickets</li>
                                    <li>Cambiar estados de tickets</li>
                                    <li>Ver notificaciones</li>
                                    <li>Ver historial de eventos</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-danger h-100">
                            <div class="card-header bg-danger text-white">
                                <strong>Si SÍ marcas la casilla</strong>
                            </div>
                            <div class="card-body">
                                <p><strong>El administrador será "super" y podrá hacer TODO lo anterior, más:</strong></p>
                                <ul class="mb-0">
                                    <li>Crear, editar y eliminar usuarios</li>
                                    <li>Crear, editar y eliminar administradores</li>
                                    <li>Gestionar tipos de tickets</li>
                                    <li>Ver TODOS los tickets del sistema</li>
                                    <li>Sin restricciones de ningún tipo</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="alert alert-warning mt-3">
                    <i class="fas fa-exclamation-triangle"></i> <strong>Consejo de seguridad:</strong> Solo asigna el rol de superadministrador a personas de máxima confianza. Demasiados superadministradores pueden comprometer la seguridad del sistema.
                </div>

                {{-- Proceso completo --}}
                <h4 class="mt-4"><i class="fas fa-list-ol"></i> Proceso Completo de Gestión</h4>
                
                <p>La gestión de administradores sigue exactamente los mismos pasos que la gestión de usuarios:</p>

                <div id="adminProcessAccordion">
                    <!-- 1. CREAR -->
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                <a class="d-block w-100 text-success" data-toggle="collapse" href="#collapseCreate">
                                    <i class="fas fa-plus-circle mr-2"></i> Crear Administrador
                                </a>
                            </h4>
                        </div>
                        <div id="collapseCreate" class="collapse show visible" data-parent="#adminProcessAccordion">
                            <div class="card-body">
                                <ol>
                                    <li>Haz clic en el botón verde <strong>"Crear Nuevo Administrador"</strong></li>
                                    <li>Rellena el formulario:
                                        <ul>
                                            <li>Nombre completo</li>
                                            <li>Correo electrónico (único)</li>
                                            <li>Contraseña (mínimo 8 caracteres)</li>
                                            <li>Confirmar contraseña</li>
                                            <li><strong>Marcar o no la casilla "¿Es superadministrador?"</strong></li>
                                        </ul>
                                    </li>
                                    <li>Haz clic en <strong>"Crear Administrador"</strong></li>
                                    <li>Si todo es correcto, verás el mensaje de éxito y el nuevo administrador aparecerá en la lista</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <!-- 2. EDITAR -->
                    <div class="card card-warning card-outline">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                <a class="d-block w-100 text-warning" data-toggle="collapse" href="#collapseEdit">
                                    <i class="fas fa-edit mr-2"></i> Editar Administrador
                                </a>
                            </h4>
                        </div>
                        <div id="collapseEdit" class="collapse visible" data-parent="#adminProcessAccordion">
                            <div class="card-body">
                                <ol>
                                    <li>Localiza al administrador en la lista</li>
                                    <li>Haz clic en el botón amarillo <strong>"Editar"</strong></li>
                                    <li>Modifica los campos que necesites:
                                        <ul>
                                            <li>Nombre</li>
                                            <li>Email</li>
                                            <li>Contraseña (opcional, déjala en blanco si no quieres cambiarla)</li>
                                            <li><strong>Cambiar el estado de superadministrador</strong> (marcar/desmarcar casilla)</li>
                                        </ul>
                                    </li>
                                    <li>Haz clic en <strong>"Actualizar Administrador"</strong></li>
                                    <li>Los cambios se aplicarán inmediatamente</li>
                                </ol>

                                <div class="alert alert-info mt-2">
                                    <i class="fas fa-info-circle"></i> <strong>Importante:</strong> Puedes convertir un administrador normal en superadministrador (o viceversa) en cualquier momento simplemente marcando o desmarcando la casilla.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 3. ELIMINAR -->
                    <div class="card card-danger card-outline">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                <a class="d-block w-100 text-danger" data-toggle="collapse" href="#collapseDelete">
                                    <i class="fas fa-trash mr-2"></i> Eliminar Administrador
                                </a>
                            </h4>
                        </div>
                        <div id="collapseDelete" class="collapse visible" data-parent="#adminProcessAccordion">
                            <div class="card-body">
                                <ol>
                                    <li>Localiza al administrador en la lista</li>
                                    <li>Haz clic en el botón rojo <strong>"Eliminar"</strong></li>
                                    <li>Lee cuidadosamente la pantalla de confirmación</li>
                                    <li>Si estás seguro, haz clic en <strong>"Sí, eliminar administrador"</strong></li>
                                    <li>El administrador será eliminado permanentemente</li>
                                </ol>

                                <div class="alert alert-danger mt-2">
                                    <i class="fas fa-exclamation-triangle"></i> <strong>ADVERTENCIA:</strong> No puedes eliminar tu propia cuenta de administrador mientras estés conectado. Tampoco puedes eliminar el último superadministrador del sistema.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- SECCIÓN: PERMISOS --}}
            <section class="mb-5" id="permisos">
                <h3 class="text-primary border-bottom pb-2"><i class="fas fa-shield-alt"></i> Matriz de Permisos</h3>
                <p>Esta tabla resume qué puede hacer cada tipo de cuenta en el sistema:</p>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Acción</th>
                                <th class="text-center">Usuario Normal</th>
                                <th class="text-center">Admin Normal</th>
                                <th class="text-center">Superadmin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Crear tickets propios</strong></td>
                                <td class="text-center"><span class="badge bg-success">✓</span></td>
                                <td class="text-center"><span class="badge bg-danger">✗</span></td>
                                <td class="text-center"><span class="badge bg-danger">✗</span></td>
                            </tr>
                            <tr>
                                <td><strong>Ver todos los tickets</strong></td>
                                <td class="text-center"><span class="badge bg-danger">✗</span></td>
                                <td class="text-center"><span class="badge bg-warning text-dark">Solo asignados</span></td>
                                <td class="text-center"><span class="badge bg-success">✓ Todos</span></td>
                            </tr>
                            <tr>
                                <td><strong>Comentar en tickets</strong></td>
                                <td class="text-center"><span class="badge bg-warning text-dark">Solo propios</span></td>
                                <td class="text-center"><span class="badge bg-success">✓</span></td>
                                <td class="text-center"><span class="badge bg-success">✓</span></td>
                            </tr>
                            <tr>
                                <td><strong>Cambiar estado de tickets</strong></td>
                                <td class="text-center"><span class="badge bg-danger">✗</span></td>
                                <td class="text-center"><span class="badge bg-success">✓</span></td>
                                <td class="text-center"><span class="badge bg-success">✓</span></td>
                            </tr>
                            <tr>
                                <td><strong>Asignar tickets</strong></td>
                                <td class="text-center"><span class="badge bg-danger">✗</span></td>
                                <td class="text-center"><span class="badge bg-success">✓</span></td>
                                <td class="text-center"><span class="badge bg-success">✓</span></td>
                            </tr>
                            <tr>
                                <td><strong>Ver notificaciones</strong></td>
                                <td class="text-center"><span class="badge bg-success">✓</span></td>
                                <td class="text-center"><span class="badge bg-success">✓</span></td>
                                <td class="text-center"><span class="badge bg-success">✓</span></td>
                            </tr>
                            <tr>
                                <td><strong>Ver historial de eventos</strong></td>
                                <td class="text-center"><span class="badge bg-danger">✗</span></td>
                                <td class="text-center"><span class="badge bg-success">✓</span></td>
                                <td class="text-center"><span class="badge bg-success">✓</span></td>
                            </tr>
                            <tr>
                                <td><strong>Gestionar usuarios</strong></td>
                                <td class="text-center"><span class="badge bg-danger">✗</span></td>
                                <td class="text-center"><span class="badge bg-danger">✗</span></td>
                                <td class="text-center"><span class="badge bg-success">✓</span></td>
                            </tr>
                            <tr>
                                <td><strong>Gestionar administradores</strong></td>
                                <td class="text-center"><span class="badge bg-danger">✗</span></td>
                                <td class="text-center"><span class="badge bg-danger">✗</span></td>
                                <td class="text-center"><span class="badge bg-success">✓</span></td>
                            </tr>
                            <tr>
                                <td><strong>Gestionar tipos de tickets</strong></td>
                                <td class="text-center"><span class="badge bg-danger">✗</span></td>
                                <td class="text-center"><span class="badge bg-danger">✗</span></td>
                                <td class="text-center"><span class="badge bg-success">✓</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            {{-- SECCIÓN: BUENAS PRÁCTICAS --}}
            <section class="mb-5" id="buenas-practicas">
                <h3 class="text-primary border-bottom pb-2"><i class="fas fa-thumbs-up"></i> Buenas Prácticas</h3>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card border-success h-100">
                            <div class="card-header bg-success text-white">
                                <h5 class="mb-0"><i class="fas fa-check"></i> Recomendaciones</h5>
                            </div>
                            <div class="card-body">
                                <ul>
                                    <li><strong>Usa emails corporativos</strong> para administradores, no personales</li>
                                    <li><strong>Establece contraseñas fuertes</strong> (8+ caracteres, letras, números, símbolos)</li>
                                    <li><strong>Limita los superadministradores</strong> a 2-3 personas de confianza</li>
                                    <li><strong>Documenta los cambios importantes</strong> (quién creó/eliminó qué cuenta)</li>
                                    <li><strong>Revisa periódicamente</strong> la lista de usuarios para detectar cuentas inactivas</li>
                                    <li><strong>Nombra claramente</strong> a los usuarios (nombre completo, no apodos)</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-danger h-100">
                            <div class="card-header bg-danger text-white">
                                <h5 class="mb-0"><i class="fas fa-times"></i> Evita Estos Errores</h5>
                            </div>
                            <div class="card-body">
                                <ul>
                                    <li><strong>No crees usuarios de prueba</strong> en el sistema de producción</li>
                                    <li><strong>No uses contraseñas simples</strong> como "12345678" o "password"</li>
                                    <li><strong>No des permisos de superadmin</strong> a todos los administradores</li>
                                    <li><strong>No elimines usuarios</strong> sin confirmar con tu equipo primero</li>
                                    <li><strong>No compartas credenciales</strong> entre múltiples personas</li>
                                    <li><strong>No ignores los emails duplicados</strong> al crear cuentas</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="alert alert-info mt-3">
                    <h5><i class="fas fa-lightbulb"></i> Consejo</h5>
                    <p class="mb-0">Mantén actualizada una lista externa (documento o hoja de cálculo) con todos los administradores activos, sus roles, y la fecha en que fueron creados. Esto te ayudará en auditorías de seguridad.</p>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
