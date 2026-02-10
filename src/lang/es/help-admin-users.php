<?php

return [
    'header' => [
        'title' => 'Gestión de Usuarios y Administradores',
        'subtitle' => 'Guía completa para administrar cuentas de usuarios y administradores del sistema',
        'role_guide' => [
            'title' => 'En esta guía aprenderás:',
            'items' => [
                'users' => 'Gestión de Usuarios Normales',
                'admins' => 'Gestión de Administradores (solo superadmin)',
                'permissions' => 'Diferencias de permisos',
                'practices' => 'Buenas prácticas',
            ],
        ],
    ],
    'section_users' => [
        'title' => 'Gestión de Usuarios Normales',
        'lead' => 'Los usuarios normales son las personas que pueden crear tickets y consultar el estado de sus solicitudes. Como administrador, puedes gestionar sus cuentas desde el panel de administración.',
        'access' => [
            'title' => 'Cómo acceder',
            'intro' => 'Para acceder a la gestión de usuarios:',
            'steps' => [
                'Desde el menú lateral izquierdo, busca la sección <strong>"Administrar todos los usuarios"</strong>',
                'Haz clic en <strong>"Administrar usuarios"</strong>',
                'Se abrirá la pantalla principal con la lista de todos los usuarios registrados',
            ],
            'important' => '<strong>Importante:</strong> Esta funcionalidad solo está disponible para <strong>superadministradores</strong>. Los administradores normales no pueden gestionar usuarios.',
        ],
        'screen_list' => [
            'title' => 'La Pantalla de Lista de Usuarios',
            'intro' => 'Cuando accedes a esta sección, verás una tabla completa con todos los usuarios del sistema:',
            'columns_title' => 'Columnas de la tabla',
            'table_headers' => [
                'col' => 'Columna',
                'show' => 'Qué muestra',
                'use' => 'Para qué sirve',
            ],
            'table_rows' => [
                'id' => ['col' => 'ID', 'show' => 'Identificador único del usuario', 'use' => 'Referencia técnica del usuario en el sistema'],
                'name' => ['col' => 'Nombre', 'show' => 'Nombre completo del usuario', 'use' => 'Identificar visualmente al usuario'],
                'email' => ['col' => 'Email', 'show' => 'Correo electrónico de acceso', 'use' => 'Contacto y credencial de inicio de sesión'],
                'created' => ['col' => 'Fecha de Creación', 'show' => 'Cuándo se registró el usuario', 'use' => 'Saber la antigüedad de la cuenta'],
                'actions' => ['col' => 'Acciones', 'show' => 'Botones de gestión', 'use' => 'Editar o eliminar el usuario'],
            ],
        ],
        'tools' => [
            'title' => 'Herramientas de la Tabla',
            'search' => [
                'title' => 'Búsqueda',
                'intro' => 'En la esquina superior derecha encontrarás un campo de búsqueda.',
                'title_how' => '<strong>Cómo usarlo:</strong>',
                'steps' => [
                    'Escribe el nombre o email del usuario que buscas',
                    'La tabla filtra automáticamente mientras escribes',
                    'Borra el texto para ver todos los usuarios nuevamente',
                ],
                'example' => '<strong>Ejemplo:</strong> Escribe "maría" para encontrar a María González o maria@example.com',
            ],
            'sort' => [
                'title' => 'Ordenación',
                'intro' => 'Haz clic en cualquier encabezado de columna para ordenar:',
                'title_options' => '<strong>Opciones:</strong>',
                'options_list' => [
                    '<strong>Primer clic:</strong> Orden ascendente (A→Z, 1→9)',
                    '<strong>Segundo clic:</strong> Orden descendente (Z→A, 9→1)',
                    '<strong>Indicador:</strong> Flecha que muestra el orden actual',
                ],
                'useful' => '<strong>Útil para:</strong> Ordenar por fecha de creación para ver los usuarios más nuevos',
            ],
            'pagination' => [
                'title' => 'Paginación y Registros por Página',
                'selector_title' => '<strong>Selector "Mostrar [número] registros":</strong>',
                'selector_list' => [
                    'Ubicado en la esquina superior izquierda',
                    'Opciones: 10, 25, 50 o 100 usuarios por página',
                    'Por defecto muestra 10',
                ],
                'controls_title' => '<strong>Controles de paginación:</strong>',
                'controls_list' => [
                    'En la parte inferior de la tabla',
                    'Botones: "Anterior", números de página, "Siguiente"',
                    'Indicador: "Mostrando 1 a 10 de 45 registros"',
                ],
            ],
        ],
    ],
    'section_create_user' => [
        'title' => 'Crear Nuevo Usuario',
        'step1' => [
            'title' => 'Paso 1: Acceder al formulario de creación',
            'text1' => 'En la pantalla de lista de usuarios, en la parte superior derecha, encontrarás un botón verde:',
            'image_alt' => 'Boton para crear un usuario.',
            'text2' => 'Haz clic en él para abrir el formulario de creación.',
        ],
        'step2' => [
            'title' => 'Paso 2: Rellenar el formulario',
            'intro' => 'El formulario de creación de usuario contiene los siguientes campos:',
            'fields' => [
                'name' => ['label' => 'Nombre completo', 'placeholder' => 'Ej: Juan Pérez García', 'small' => 'El nombre que verá el usuario en su perfil y que verás tú en la lista.'],
                'email' => ['label' => 'Correo electrónico', 'placeholder' => 'Ej: juan.perez@empresa.com', 'small' => 'Será su nombre de usuario para iniciar sesión. Debe ser único en el sistema.'],
                'password' => ['label' => 'Contraseña', 'placeholder' => 'Mínimo 8 caracteres', 'small' => 'Debe tener al menos 8 caracteres. El usuario podrá cambiarla después.'],
                'confirm' => ['label' => 'Confirmar contraseña', 'placeholder' => 'Repite la contraseña', 'small' => 'Escribe la misma contraseña para confirmar que no hay errores.'],
            ],
            'alert_required' => 'Los campos marcados con <span class="text-danger">*</span> son obligatorios. El formulario no se enviará si faltan.',
        ],
        'step3' => [
            'title' => 'Paso 3: Guardar el usuario',
            'intro' => 'Una vez completado el formulario correctamente:',
            'list' => [
                'Revisa que todos los datos sean correctos',
                'Haz clic en el botón verde <strong>"Crear Usuario"</strong> al final del formulario',
                'El sistema validará los datos automáticamente',
            ],
            'success_card' => [
                'title' => 'Si todo es correcto',
                'text1' => 'Verás un mensaje de éxito en la parte superior:',
                'alert' => 'Usuario creado exitosamente',
                'text2' => 'Serás redirigido a la lista de usuarios y el nuevo usuario aparecerá en la tabla.',
            ],
            'error_card' => [
                'title' => 'Si hay errores',
                'intro' => 'El sistema mostrará mensajes de error específicos debajo de cada campo con problema:',
                'list' => [
                    '<strong>"El campo nombre es obligatorio"</strong> - Falta rellenar el nombre',
                    '<strong>"El email ya está registrado"</strong> - Ese correo ya existe en el sistema',
                    '<strong>"Las contraseñas no coinciden"</strong> - La contraseña y confirmación son diferentes',
                    '<strong>"La contraseña debe tener al menos 8 caracteres"</strong> - Contraseña muy corta',
                ],
                'footer' => 'Corrige los errores indicados y vuelve a hacer clic en "Crear Usuario".',
            ],
        ],
    ],
    'section_edit_user' => [
        'title' => 'Editar Usuario Existente',
        'when' => [
            'title' => 'Cuándo editar un usuario',
            'intro' => 'Puedes necesitar editar un usuario cuando:',
            'list' => [
                'El usuario cambió de nombre (por ejemplo, por matrimonio)',
                'El correo electrónico ya no es válido y necesita actualizarse',
                'El usuario olvidó su contraseña y necesitas restablecerla',
                'Hay errores tipográficos en los datos del usuario',
            ],
        ],
        'step1' => [
            'title' => 'Paso 1: Localizar el usuario',
            'list' => [
                'En la lista de usuarios, busca al usuario que quieres editar (usa la búsqueda si es necesario)',
                'En la columna "Acciones" de esa fila, verás dos botones',
                'Haz clic en el botón <strong>amarillo con icono de lápiz</strong> (Editar)',
            ],
            'image_alt' => 'Sección de botones de acción para usuarios, <strong>editar (amarillo)</strong> y eliminar(rojo).',
        ],
        'step2' => [
            'title' => 'Paso 2: Modificar los datos',
            'intro' => 'Se abrirá un formulario pre-rellenado con los datos actuales del usuario. Puedes modificar:',
            'table_headers' => ['field' => 'Campo', 'can_change' => '¿Puedes cambiarlo?', 'considerations' => 'Consideraciones'],
            'table_rows' => [
                'name' => ['field' => 'Nombre', 'can_change' => 'Sí', 'considerations' => 'Sin restricciones'],
                'email' => ['field' => 'Email', 'can_change' => 'Sí', 'considerations' => 'Debe ser único (no usado por otro usuario)'],
                'password' => ['field' => 'Contraseña', 'can_change' => 'Opcional', 'considerations' => 'Déjala en blanco si NO quieres cambiarla. Rellenala solo si quieres establecer una nueva.'],
                'confirm' => ['field' => 'Confirmar contraseña', 'can_change' => 'Opcional', 'considerations' => 'Solo si cambias la contraseña'],
            ],
            'alert_password' => '<strong>Importante sobre la contraseña:</strong> Si dejas los campos de contraseña en blanco, la contraseña actual del usuario NO se modificará. Solo rellena estos campos si quieres cambiarla.',
        ],
        'step3' => [
            'title' => 'Paso 3: Guardar los cambios',
            'list' => [
                'Revisa que todos los cambios sean correctos',
                'Haz clic en el botón <strong>"Actualizar Usuario"</strong>',
                'Si todo es correcto, verás un mensaje de éxito y serás redirigido a la lista',
            ],
            'success_alert' => 'Usuario actualizado correctamente',
        ],
    ],
    'section_delete_user' => [
        'title' => 'Eliminar Usuario',
        'alert_caution' => '<strong>¡PRECAUCIÓN!</strong> Eliminar un usuario es una acción <strong>permanente e irreversible</strong>. Todos los datos del usuario se perderán.',
        'when' => [
            'title' => 'Cuándo eliminar un usuario',
            'intro' => 'Solo deberías eliminar un usuario cuando:',
            'list' => [
                'El usuario ha dejado la organización y ya no necesita acceso',
                'Se creó una cuenta de prueba que ya no se necesita',
                'Se detectó una cuenta duplicada por error',
                'El usuario lo solicita expresamente (derecho al olvido)',
            ],
        ],
        'note_orphans' => '<strong>Nota:</strong> Al eliminar un usuario, todos sus tickets permanecerán en el sistema pero quedarán huérfanos (sin propietario visible). Esto es intencional para mantener el historial.',
        'step1' => [
            'title' => 'Paso 1: Solicitar confirmación',
            'list' => [
                'En la lista de usuarios, localiza al usuario que quieres eliminar',
                'En la columna "Acciones", haz clic en el botón <strong>rojo con icono de papelera</strong>',
            ],
            'image_alt' => 'Sección de botones de acción para usuarios, editar (amarillo) y <strong>eliminar(rojo)</strong>.',
        ],
        'step2' => [
            'title' => 'Paso 2: Pantalla de confirmación',
            'intro' => 'Se abrirá una nueva pantalla con un mensaje de advertencia claro:',
            'image_alt' => 'Modal de confirmación de eliminación de usuario.',
        ],
        'step3' => [
            'title' => 'Paso 3: Confirmar o cancelar',
            'list' => [
                '<strong>Si haces clic en "Cancelar":</strong> Volverás a la lista sin eliminar nada',
                '<strong>Si haces clic en "Sí, eliminar usuario":</strong> El usuario será eliminado permanentemente',
            ],
            'success_alert' => 'Usuario eliminado correctamente',
        ],
    ],
    'section_admins' => [
        'title' => 'Gestión de Administradores (Solo Superadministrador)',
        'alert_access' => '<strong>Acceso restringido:</strong> Solo los <strong>superadministradores</strong> pueden acceder a esta funcionalidad. Los administradores normales no verán esta opción en el menú.',
        'lead' => 'Los administradores son usuarios con permisos especiales que pueden gestionar tickets, usuarios, y el sistema en general. La gestión de administradores funciona de forma muy similar a la gestión de usuarios, pero con algunas diferencias clave.',
        'access' => [
            'title' => 'Cómo acceder',
            'list' => [
                'Desde el menú lateral izquierdo, busca la sección <strong>"Administrar todos los usuarios"</strong>',
                'Haz clic en <strong>"Administrar admins"</strong>',
                'Se abrirá la pantalla con la lista de administradores',
            ],
            'image_alt' => 'Ejemplo de tabla de administradores.',
        ],
        'differences' => [
            'title' => 'Diferencias con la Gestión de Usuarios',
            'table_headers' => ['feature' => 'Característica', 'users' => 'Usuarios Normales', 'admins' => 'Administradores'],
            'table_rows' => [
                'access' => ['feature' => 'Acceso al sistema', 'users' => 'Panel de usuario (/user)', 'admins' => 'Panel de administración (/admin)'],
                'create_tickets' => ['feature' => 'Pueden crear tickets', 'users' => 'Sí', 'admins' => 'No'],
                'manage_tickets' => ['feature' => 'Pueden gestionar tickets', 'users' => 'No', 'admins' => 'Sí'],
                'extra_field' => ['feature' => 'Campo adicional en formulario', 'users' => 'Ninguno', 'admins' => 'Checkbox "¿Es superadministrador?"'],
                'quantity' => ['feature' => 'Cantidad recomendada', 'users' => 'Ilimitada (según necesidad)', 'admins' => 'Limitada (solo personal de soporte)'],
            ],
        ],
        'superadmin' => [
            'title' => 'Campo Especial: "¿Es Superadministrador?"',
            'intro' => 'Al crear o editar un administrador, verás un campo adicional que NO existe para usuarios normales:',
            'image_alt' => 'Opción de "¿Es superadministrador?" en el formulario de administrador.',
            'cards' => [
                'no_check' => [
                    'title' => 'Si NO marcas la casilla',
                    'intro' => 'El administrador será "normal" y podrá:',
                    'list' => ['Ver tickets asignados a él', 'Comentar en tickets', 'Cambiar estados de tickets', 'Ver notificaciones', 'Ver historial de eventos'],
                ],
                'yes_check' => [
                    'title' => 'Si SÍ marcas la casilla',
                    'intro' => 'El administrador será "super" y podrá hacer TODO lo anterior, más:',
                    'list' => ['Crear, editar y eliminar usuarios', 'Crear, editar y eliminar administradores', 'Gestionar tipos de tickets', 'Ver TODOS los tickets del sistema', 'Sin restricciones de ningún tipo'],
                ],
            ],
            'alert_security' => '<strong>Consejo de seguridad:</strong> Solo asigna el rol de superadministrador a personas de máxima confianza. Demasiados superadministradores pueden comprometer la seguridad del sistema.',
        ],
        'process' => [
            'title' => 'Proceso Completo de Gestión',
            'intro' => 'La gestión de administradores sigue exactamente los mismos pasos que la gestión de usuarios:',
            'create' => [
                'title' => 'Crear Administrador',
                'steps' => [
                    'Haz clic en el botón verde <strong>"Crear Nuevo Administrador"</strong>',
                    'Rellena el formulario:
                        <ul>
                            <li>Nombre completo</li>
                            <li>Correo electrónico (único)</li>
                            <li>Contraseña (mínimo 8 caracteres)</li>
                            <li>Confirmar contraseña</li>
                            <li><strong>Marcar o no la casilla "¿Es superadministrador?"</strong></li>
                        </ul>',
                    'Haz clic en <strong>"Crear Administrador"</strong>',
                    'Si todo es correcto, verás el mensaje de éxito y el nuevo administrador aparecerá en la lista',
                ],
            ],
            'edit' => [
                'title' => 'Editar Administrador',
                'steps' => [
                    'Localiza al administrador en la lista',
                    'Haz clic en el botón amarillo <strong>"Editar"</strong>',
                    'Modifica los campos que necesites:
                        <ul>
                            <li>Nombre</li>
                            <li>Email</li>
                            <li>Contraseña (opcional, déjala en blanco si no quieres cambiarla)</li>
                            <li><strong>Cambiar el estado de superadministrador</strong> (marcar/desmarcar casilla)</li>
                        </ul>',
                    'Haz clic en <strong>"Actualizar Administrador"</strong>',
                    'Los cambios se aplicarán inmediatamente',
                ],
                'note' => '<strong>Importante:</strong> Puedes convertir un administrador normal en superadministrador (o viceversa) en cualquier momento simplemente marcando o desmarcando la casilla.',
            ],
            'delete' => [
                'title' => 'Eliminar Administrador',
                'steps' => [
                    'Localiza al administrador en la lista',
                    'Haz clic en el botón rojo <strong>"Eliminar"</strong>',
                    'Lee cuidadosamente la pantalla de confirmación',
                    'Si estás seguro, haz clic en <strong>"Sí, eliminar administrador"</strong>',
                    'El administrador será eliminado permanentemente',
                ],
                'warning' => '<strong>ADVERTENCIA:</strong> No puedes eliminar tu propia cuenta de administrador mientras estés conectado. Tampoco puedes eliminar el último superadministrador del sistema.',
            ],
        ],
    ],
    'section_permissions' => [
        'title' => 'Matriz de Permisos',
        'intro' => 'Esta tabla resume qué puede hacer cada tipo de cuenta en el sistema:',
        'table_headers' => ['action' => 'Acción', 'user' => 'Usuario Normal', 'admin' => 'Admin Normal', 'superadmin' => 'Superadmin'],
        'table_rows' => [
            'create_own' => ['action' => 'Crear tickets propios', 'user' => '✓', 'admin' => '✗', 'superadmin' => '✗'],
            'view_all' => ['action' => 'Ver todos los tickets', 'user' => '✗', 'admin' => 'Solo asignados', 'superadmin' => '✓ Todos'],
            'comment' => ['action' => 'Comentar en tickets', 'user' => 'Solo propios', 'admin' => '✓', 'superadmin' => '✓'],
            'change_status' => ['action' => 'Cambiar estado de tickets', 'user' => '✗', 'admin' => '✓', 'superadmin' => '✓'],
            'assign' => ['action' => 'Asignar tickets', 'user' => '✗', 'admin' => '✓', 'superadmin' => '✓'],
            'notifications' => ['action' => 'Ver notificaciones', 'user' => '✓', 'admin' => '✓', 'superadmin' => '✓'],
            'events' => ['action' => 'Ver historial de eventos', 'user' => '✗', 'admin' => '✓', 'superadmin' => '✓'],
            'manage_users' => ['action' => 'Gestionar usuarios', 'user' => '✗', 'admin' => '✗', 'superadmin' => '✓'],
            'manage_admins' => ['action' => 'Gestionar administradores', 'user' => '✗', 'admin' => '✗', 'superadmin' => '✓'],
            'manage_types' => ['action' => 'Gestionar tipos de tickets', 'user' => '✗', 'admin' => '✗', 'superadmin' => '✓'],
        ],
    ],
    'section_practices' => [
        'title' => 'Buenas Prácticas',
        'recommendations' => [
            'title' => 'Recomendaciones',
            'list' => [
                '<strong>Usa emails corporativos</strong> para administradores, no personales',
                '<strong>Establece contraseñas fuertes</strong> (8+ caracteres, letras, números, símbolos)',
                '<strong>Limita los superadministradores</strong> a 2-3 personas de confianza',
                '<strong>Documenta los cambios importantes</strong> (quién creó/eliminó qué cuenta)',
                '<strong>Revisa periódicamente</strong> la lista de usuarios para detectar cuentas inactivas',
                '<strong>Nombra claramente</strong> a los usuarios (nombre completo, no apodos)',
            ],
        ],
        'errors' => [
            'title' => 'Evita Estos Errores',
            'list' => [
                '<strong>No crees usuarios de prueba</strong> en el sistema de producción',
                '<strong>No uses contraseñas simples</strong> como "12345678" o "password"',
                '<strong>No des permisos de superadmin</strong> a todos los administradores',
                '<strong>No elimines usuarios</strong> sin confirmar con tu equipo primero',
                '<strong>No compartas credenciales</strong> entre múltiples personas',
                '<strong>No ignores los emails duplicados</strong> al crear cuentas',
            ],
        ],
        'advice' => [
            'title' => 'Consejo',
            'text' => 'Mantén actualizada una lista externa (documento o hoja de cálculo) con todos los administradores activos, sus roles, y la fecha en que fueron creados. Esto te ayudará en auditorías de seguridad.',
        ],
    ],
];
