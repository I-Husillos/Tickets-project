<?php

return [
    'title' => 'Ayuda · Gestión de Tickets',
    'header' => 'Gestión de Tickets',
    'breadcrumbs' => [
        'help' => 'Ayuda',
        'tickets' => 'Tickets',
    ],
    'intro' => [
        'title' => '¿Qué es un Ticket?',
        'text' => 'Un "Ticket" es el registro digital de tu solicitud, incidencia o pregunta. Es como un expediente que contiene toda la información del problema, la conversación con el técnico y el estado actual de la resolución.',
    ],
    'create' => [
        'title' => '1. ¿Cómo crear un nuevo Ticket?',
        'step1' => 'Sigue estos pasos para reportar una incidencia:',
        'list' => [
            '1' => [
                'title' => 'Ir a la sección Tickets:',
                'text' => 'En el menú lateral izquierdo, haz clic en',
            ],
            '2' => [
                'title' => 'Botón Crear:',
                'text' => 'Haz clic en el botón',
                'suffix' => 'situado en la parte superior derecha de la tabla.'
            ],
            '3' => [
                'title' => 'Completar el Formulario:',
                'li1' => [
                    'text' => '(Obligatorio) Escribe un resumen breve y claro del problema (ej. "Error al imprimir factura"). Evita títulos genéricos como "Ayuda" o "Problema".'
                ],
                'li2' => [
                    'text' => '(Obligatorio) Explica qué sucede. Incluye mensajes de error si los hay.',
                    'alert' => '<strong>Importante:</strong> Este campo tiene un límite de <strong>255 caracteres</strong>.<br>Si necesitas extenderte más, crea el ticket con un resumen breve y añade todos los detalles necesarios usando un <strong>Comentario</strong> (que permite texto ilimitado) una vez creado.'
                ],
                'li3' => [
                    'text' => 'Selecciona qué tan urgente es. <i>Úsalo con responsabilidad</i>; marcar todo como "Alta" puede retrasar la gestión.'
                ],
                'li4' => [
                    'text' => 'Elige la categoría que mejor se ajuste (ej. Incidencia Técnica, Consulta, etc.).'
                ],
                'note' => '<strong>Nota sobre Archivos:</strong> Actualmente no es posible adjuntar ficheros directamente. Por favor, describe el contenido o usa enlaces externos si es necesario.',
            ],
            '4' => [
                'title' => 'Enviar:',
                'text' => 'Haz clic en el botón <strong>Guardar</strong>. El sistema te redirigirá a la lista de tickets y verás un mensaje de confirmación.'
            ]
        ],
        'img_caption' => 'Ejemplo del formulario para crear un nuevo ticket'
    ],
    'list' => [
        'title' => '2. Ver y Buscar mis Tickets',
        'intro' => 'En la pantalla principal de "Tickets" verás un listado de todos tus tickets creados, ordenados del más reciente al más antiguo.',
        'img_caption' => 'Ejemplo de la tabla donde se listan los tickets',
        'table_title' => 'La Tabla de Tickets',
        'table_intro' => 'Cada fila representa un ticket e incluye columnas clave:',
        'columns' => [
            'id' => '<strong>ID:</strong> Número único de identificación del ticket (útil para referencias).',
            'title' => '<strong>Título:</strong> El asunto del ticket.',
            'status' => '<strong>Estado:</strong> Estado actual del proceso (ver sección Estados).',
            'priority' => '<strong>Prioridad y Tipo:</strong> Clasificación del ticket.',
            'actions' => '<strong>Acciones:</strong> Botones para interactuar con el ticket.'
        ],
        'search_title' => 'Buscador',
        'search_text' => 'Si tienes muchos tickets, usa la barra de búsqueda en la parte superior de la lista. Escribe una palabra clave del título (ej. "impresora") y presiona "Enter" o el botón de buscar. Esto filtrará la lista para mostrar solo las coincidencias.'
    ],
    'states' => [
        'title' => '3. Ciclo de Vida y Estados del Ticket',
        'intro' => 'Un ticket pasa por varios estados desde que nace hasta que se cierra. Entenderlos es vital para saber qué se espera de ti:',
        'open' => 'Abierto / Pendiente',
        'open_desc' => 'El ticket ha sido creado y enviado al sistema correctamente. Los administradores pueden verlo, pero aún no han comenzado a trabajar en él o están en proceso de triage y asignación.',
        'progress' => 'En Progreso / Asignado',
        'progress_desc' => 'Un administrador ha sido asignado a tu caso y está trabajando en él. Es probable que recibas comentarios solicitando más información. Revisa tus notificaciones.',
        'resolved' => 'Resuelto',
        'resolved_desc' => 'El administrador indica que ha solucionado el problema.',
        'resolved_action' => '<strong>¡TU TURNO!</strong> En este punto, se requiere tu confirmación.',
        'resolved_list' => [
            '1' => 'Si funciona: Debes usar la opción <strong>"Validar"</strong> para cerrar el ticket.',
            '2' => 'Si NO funciona: Debes comentar indicando que el fallo persiste, para que el administrador siga trabajando.'
        ],
        'closed' => 'Cerrado',
        'closed_desc' => 'El proceso ha finalizado. El ticket queda guardado en tu historial como referencia, pero ya no admite más cambios, comentarios ni ediciones.'
    ],
    'detail' => [
        'title' => '4. Pantalla de Detalle: Estructura Completa',
        'intro' => 'La pantalla de detalle del ticket se ha diseñado para que tengas todo a mano. Está dividida en tres áreas principales (Izquierda, Derecha e Inferior). A continuación explicamos cada una:',
        'img_caption' => '<em>Vista general: Izquierda (Info), Derecha (Nuevo mensaje), Abajo (Historial).</em>',
        'zone_a' => [
            'title' => 'A. Zona Izquierda: Información y Validación',
            'text' => 'Este panel contiene la "ficha técnica" de tu incidencia:',
            'list' => [
                '1' => '<strong>Título y Descripción:</strong> El problema tal como lo reportaste.',
                '2' => '<strong>Estado y Prioridad:</strong> Badges de color indicando la situación actual.',
                '3' => '<strong>Fechas:</strong> Creación y última actualización.'
            ],
            'validation' => [
                'title' => 'Área de Validación (¡Importante!)',
                'text' => 'Solo aparece cuando el estado es <strong>Resolved</strong>.',
                'validate' => '<span class="badge badge-success"><i class="fas fa-check"></i> Validar</span>: Confirma que la solución funciona. El ticket se cerrará (Closed).',
                'reject' => '<span class="badge badge-danger"><i class="fas fa-times"></i> Rechazar</span>: Indica que NO funciona. El ticket volverá a "Pendiente".'
            ]
        ],
        'zone_b' => [
            'title' => 'B. Zona Derecha: Agregar Comentarios',
            'text' => 'Usa este formulario para comunicarte con el soporte. Es el canal oficial para añadir información.',
            'usage' => '¿Cuándo usarlo?',
            'list' => [
                '1' => 'Para responder preguntas del técnico.',
                '2' => 'Para adjuntar nuevos datos o errores.',
                '3' => 'Para preguntar "¿Cómo va mi caso?".'
            ],
            'footer' => 'Simplemente escribe y pulsa <strong>"Agregar Comentario"</strong>.'
        ],
        'zone_c' => [
            'title' => 'C. Zona Inferior: Historial de Conversación',
            'text' => 'Debajo de los paneles superiores verás la <strong>Línea de Tiempo (Timeline)</strong>. Aquí queda registrado todo el histórico del ticket.',
            'list' => [
                '1' => '<strong>Todo en un lugar:</strong> Verás tus mensajes y las respuestas de los administradores intercaladas por fecha.',
                '2' => '<strong>Identificación:</strong>',
                'sublist' => [
                    '1' => 'Tus mensajes tienen botones de <i class="fas fa-edit text-primary"></i> Editar y <i class="fas fa-trash text-danger"></i> Eliminar.',
                    '2' => 'Las respuestas del Admin aparecen con su nombre y cabecera distintiva.'
                ]
            ],
            'img_caption' => 'Ejemplo de conversación en el ticket'
        ]
    ],
    'advanced' => [
        'title' => '5. Editar y Eliminar (Gestión Avanzada)',
        'intro' => 'Es posible que necesites corregir información inicial o cancelar una solicitud por error. Aquí te explicamos cómo funcionan estos procesos críticos.',
        'edit' => [
            'title' => 'A. Editar un Ticket',
            'subtitle' => 'Disponible mientras el ticket no esté <strong>Cerrado</strong>.',
            'step1' => 'Haz clic en el botón <span class="badge badge-warning"><i class="fas fa-pencil-alt"></i> Editar</span> en la tabla principal.',
            'step2' => 'Se abrirá un formulario similar al de creación, pero con tus datos cargados.',
            'step2_list' => '<em>Puedes modificar:</em> Título, Descripción, Prioridad y Tipo.',
            'step3' => 'Al pulsar <strong>Actualizar</strong>, volverás al listado.',
            'success_title' => 'Confirmación de Éxito:',
            'success_text' => 'Verás un mensaje verde en la parte superior:<br><em>"Ticket actualizado correctamente."</em>',
            'img_caption' => 'Ejemplo del mensaje de confirmación tras editar un ticket'
        ],
        'delete' => [
            'title' => 'B. Eliminar un Ticket',
            'warning' => '<strong><i class="fas fa-exclamation-triangle"></i> ¡Advertencia!</strong> Esta acción es irreversible. El ticket desaparecerá de tu historial y del panel del administrador.',
            'step1' => 'Haz clic en el botón <span class="badge badge-danger"><i class="fas fa-trash"></i> Eliminar</span>.',
            'step2' => '<strong>Paso de Seguridad:</strong> El navegador mostrará una ventana emergente (Pop-up) preguntando:<br><em>"¿Estás seguro de eliminar este ticket?"</em>',
            'step3' => 'Si aceptas, ocurrirá lo siguiente:',
            'step3_list' => [
                '1' => 'Aparecerá una alerta confirmando: <em>"Ticket eliminado"</em>.',
                '2' => 'La tabla se actualizará automáticamente y la fila desaparecerá.'
            ],
            'img_caption' => 'Ejemplo del mensaje de confirmación'
        ]
    ],
    'introduction_page' => [
        'title' => 'Ayuda · Introducción',
        'header' => 'Introducción y Primeros Pasos',
        'breadcrumbs' => 'Ayuda',
        'welcome' => [
            'title' => 'Bienvenido al Portal de Usuarios',
            'text1' => 'Bienvenido a la plataforma de gestión de incidencias y soporte (Tickets). Esta herramienta ha sido diseñada para centralizar, organizar y agilizar toda la comunicación entre tú y el equipo de soporte técnico/administración.',
            'text2' => 'A través de este portal, podrás reportar problemas, realizar solicitudes de servicio, consultar el estado de tus peticiones anteriores y mantener una comunicación directa y registrada con los responsables de resolver tus incidencias.',
            'can_do' => [
                'title' => 'Lo que PUEDES hacer:',
                'list' => [
                    'create' => '<strong>Crear Tickets:</strong> Abrir nuevas solicitudes de soporte detallando tu problema o requerimiento.',
                    'history' => '<strong>Consultar Historial:</strong> Ver todos los tickets que has creado, filtrarlos y buscar por palabras clave.',
                    'comment' => '<strong>Comentar:</strong> Dialogar con los agentes mediante un hilo de comentarios dentro de cada ticket.',
                    'notifications' => '<strong>Recibir Notificaciones:</strong> Estar al tanto de actualizaciones, cambios de estado o respuestas en tus tickets.',
                    'validate' => '<strong>Validar Soluciones:</strong> Confirmar si la solución propuesta por el agente ha resuelto tu problema.',
                    'edit' => '<strong>Editar/Eliminar:</strong> Modificar la información de tus tickets o eliminarlos (bajo ciertas condiciones).'
                ]
            ],
            'cannot_do' => [
                'title' => 'Lo que NO puedes hacer:',
                'list' => [
                    'view_others' => 'Ver los tickets de otros usuarios (por privacidad y seguridad).',
                    'assign' => 'Asignar tickets a administradores específicos (el sistema o los administradores se encargan de la asignación).',
                    'modify_closed' => 'Modificar un ticket una vez que ha sido cerrado (aunque podrás consultarlo).'
                ]
            ]
        ],
        'dashboard' => [
            'title' => 'Panel de Control del usuario (Dashboard)',
            'text' => 'Al iniciar sesión, accederás inmediatamente a tu <strong>Panel de Control</strong>. Esta es tu "base de operaciones".',
            'img_caption' => 'Ejemplo del Panel de Control del Usuario',
            'green_box' => [
                 'title' => 'Tickets Abiertos',
                 'desc' => 'En color <strong>Verde</strong>. Tickets activos que están siendo atendidos.'
            ],
            'blue_box' => [
                 'title' => 'Tickets Resueltos',
                 'desc' => 'En color <strong>Azul</strong>. Solucionados pero pendientes de que los valides.'
            ],
            'yellow_box' => [
                 'title' => 'Tickets Pendientes',
                 'desc' => 'En color <strong>Amarillo</strong>. Tickets esperando acción.'
            ],
            'components' => [
                'title' => 'Componentes del Panel:',
                'summary_dt' => 'Resumen de Estado',
                'summary_dd' => 'Tres tarjetas de colores (Verde, Azul, Amarillo) que te dan un vistazo rápido de cuántos tickets tienes en cada situación.',
                'latest_dt' => 'Últimos Tickets',
                'latest_dd' => 'Una lista en la parte inferior con los tickets que han tenido actividad reciente. Incluye botones rápidos para <span class="badge badge-primary"><i class="fas fa-eye"></i> Ver</span> y <span class="badge badge-warning"><i class="fas fa-edit"></i> Editar</span>.',
                'create_dt' => 'Crear Rápido',
                'create_dd' => 'Un botón en la parte superior derecha de la tarjeta principal para abrir una nueva incidencia al instante.'
            ]
        ],
        'profile' => [
            'title' => 'Mi Perfil',
            'text1' => 'Puedes acceder a tu perfil haciendo clic en tu nombre en la esquina superior derecha y seleccionando el icono <strong><i class="fas fa-user fa-2x mb-2"></i></strong> o bien haciendo click sobre <strong>tu nombre en el menu lateral</strong>.',
            'text2' => 'En esta sección podrás visualizar tus datos registrados en el sistema:',
            'list' => [
                'name' => 'Nombre completo.',
                'email' => 'Correo electrónico asociado.',
                'date' => 'Fecha de registro.'
            ],
            'note' => '<strong>Nota Importante:</strong> Por razones de seguridad, la edición de datos sensibles (como el correo electrónico) está restringida. Si necesitas corregir un dato erróneo, por favor crea un ticket solicitándolo a un administrador.',
            'img1_caption' => 'Ejemplo del menú de opciones',
            'img2_caption' => 'Ejemplo de acceso al perfil desde el menú lateral'
        ],
        'support' => [
            'title' => '¿Necesitas más ayuda?',
            'text' => 'Esta sección de ayuda se divide en tres partes fundamentales. Te recomendamos leerlas para dominar la herramienta:',
            'buttons' => [
                'intro' => 'Introducción',
                'tickets' => 'Tickets',
                'notifications' => 'Notificaciones',
                'profile' => 'Mi Perfil'
            ]
        ]
    ],
    'notifications_page' => [
        'title' => 'Documentación - Notificaciones',
        'header' => 'Notificaciones del Usuario',
        'breadcrumbs' => 'Mis Notificaciones',
        'intro' => [
            'title' => '¿Qué son las notificaciones?',
            'text' => 'El sistema de notificaciones te mantiene informado automáticamente sobre cualquier cambio importante en tus tickets. No necesitas revisar cada ticket manualmente: la aplicación te avisa cuando algo sucede.',
        ],
        'access' => [
            'title' => 'Cómo acceder a tus notificaciones',
            'subtitle' => 'Hay <strong>dos formas</strong> de ver tus notificaciones:',
            'option1' => [
                'title' => 'Opción 1: Desde el icono de la campana',
                'text' => 'En la <strong>parte superior derecha</strong> de la pantalla, junto al selector de idioma y tu foto de perfil, encontrarás un icono de campana.',
                'alert_title' => 'Indicador de notificaciones nuevas:',
                'list' => [
                    '1' => 'Si tienes notificaciones sin leer, aparece un <strong>círculo amarillo con un número</strong> que indica cuántas notificaciones nuevas tienes.',
                    '2' => 'Ejemplo: Si ves un "5" sobre la campana, significa que tienes 5 notificaciones pendientes de revisar.'
                ],
                'action' => '<strong>Para acceder:</strong> Haz clic en el icono de la campana y serás redirigido a la página completa de notificaciones.'
            ],
            'option2' => [
                'title' => 'Opción 2: Desde el menú lateral',
                'text' => 'En el menú de navegación del lado izquierdo, busca la opción <strong>"Notificaciones"</strong> (con un icono de campana). Haz clic ahí para acceder.'
            ]
        ],
        'screen' => [
            'title' => 'La pantalla de notificaciones',
            'intro' => 'Cuando entras a esta sección, verás:',
            'location' => [
                'title' => 'Ubicación en el sistema',
                'text' => 'En la parte superior aparece una ruta que te muestra dónde estás:',
                'path' => 'Inicio / Mis Notificaciones',
                'note' => 'Puedes hacer clic en "Inicio" para volver al panel principal.'
            ],
            'table' => [
                'title' => 'La tabla de notificaciones',
                'intro' => 'Todas tus notificaciones se muestran en una <strong>tabla organizada</strong> con <strong>4 columnas</strong>:',
                'headers' => [
                    'col' => 'Columna',
                    'what' => 'Qué muestra',
                    'example' => 'Ejemplo'
                ],
                'columns' => [
                    'type' => 'Tipo',
                    'type_desc' => 'El tipo de evento que ocurrió',
                    'type_example' => 'Comentario, Estado, Creado',
                    'content' => 'Contenido',
                    'content_desc' => 'Un resumen de lo que pasó',
                    'content_example' => '"Se ha agregado un nuevo comentario en tu ticket"',
                    'date' => 'Fecha',
                    'date_desc' => 'Cuándo ocurrió el evento',
                    'date_example' => '12/06/2025 11:53',
                    'actions' => 'Acciones',
                    'actions_desc' => 'Botones para interactuar',
                    'actions_example' => 'Ver detalles, Marcar como leída'
                ],
            ]
        ],
        'types' => [
            'title' => 'Tipos de notificaciones que puedes recibir',
            'comment' => [
                'title' => 'Nuevo Comentario',
                'when' => '<strong>Cuándo la recibes:</strong> Cuando un administrador escribe un comentario en uno de tus tickets.',
                'what' => '<strong>Qué dice:</strong> "Se ha agregado un nuevo comentario en tu ticket"',
                'why' => '<strong>Por qué es útil:</strong> Te avisa que alguien respondió a tu solicitud sin tener que revisar todos tus tickets uno por uno.'
            ],
            'status' => [
                'title' => 'Cambio de Estado',
                'when' => '<strong>Cuándo la recibes:</strong> Cuando un administrador cambia el estado de tu ticket (por ejemplo, de "Pendiente" a "En Proceso" o "Resuelto").',
                'what' => '<strong>Qué dice:</strong> "El ticket con ID [número] ha sido actualizado"',
                'why' => '<strong>Por qué es útil:</strong> Sabes inmediatamente que tu ticket está siendo atendido o que ya fue resuelto.'
            ],
            'created' => [
                'title' => 'Ticket Creado',
                'when' => '<strong>Cuándo la recibes:</strong> Cuando creas un nuevo ticket exitosamente.',
                'what' => '<strong>Qué dice:</strong> "Nuevo ticket creado con ID [número]"',
                'why' => '<strong>Por qué es útil:</strong> Confirma que tu solicitud fue registrada correctamente en el sistema.'
            ],
            'closed' => [
                'title' => 'Ticket Cerrado',
                'when' => '<strong>Cuándo la recibes:</strong> Cuando un administrador marca tu ticket como cerrado.',
                'what' => '<strong>Qué dice:</strong> "El ticket ha sido cerrado"',
                'why' => '<strong>Por qué es útil:</strong> Te informa que el problema se considera resuelto y el ticket ya no está activo.'
            ],
            'reopened' => [
                'title' => 'Ticket Reabierto',
                'when' => '<strong>Cuándo la recibes:</strong> Cuando un ticket que estaba cerrado se vuelve a abrir (por ti o por un administrador).',
                'what' => '<strong>Qué dice:</strong> "El ticket ha sido reabierto"',
                'why' => '<strong>Por qué es útil:</strong> Sabes que el problema se está revisando nuevamente.'
            ]
        ],
        'tools' => [
            'title' => 'Herramientas de la tabla',
            'intro' => 'La tabla incluye varias funciones que te ayudan a organizar y encontrar información:',
            'search' => [
                'title' => 'Búsqueda',
                'text' => 'En la esquina superior derecha hay un campo que dice <strong>"Buscar:"</strong>',
                'list' => [
                    '1' => 'Escribe cualquier palabra (por ejemplo, "comentario" o el nombre de un ticket)',
                    '2' => 'La tabla filtra automáticamente y muestra solo las notificaciones que coinciden',
                    '3' => 'Borra el texto para ver todas las notificaciones nuevamente'
                ]
            ],
            'records' => [
                'title' => 'Cantidad de registros por página',
                'text' => 'En la esquina superior izquierda verás <strong>"Mostrar 10 registros"</strong> (con un menú desplegable). Puedes cambiar cuántas notificaciones ver en cada página:',
                'list' => [
                    '10' => '10 registros (valor por defecto)',
                    '25' => '25 registros',
                    '50' => '50 registros',
                    '100' => '100 registros'
                ],
                'note' => 'Esto es útil si tienes muchas notificaciones y quieres verlas todas sin cambiar de página constantemente.'
            ],
            'pagination' => [
                'title' => 'Paginación',
                'text' => 'Si tienes más notificaciones de las que caben en una página, verás en la parte inferior:',
                'example' => 'Mostrando 1 a 10 de 25 registros [Anterior] [1] [2] [3] [Siguiente]',
                'list' => [
                    'nav' => '<strong>Anterior/Siguiente:</strong> Navega entre páginas',
                    'jump' => '<strong>Números:</strong> Salta directamente a una página específica',
                    'info' => '<strong>Indicador:</strong> Te muestra cuántas notificaciones hay en total'
                ]
            ],
            'sort' => [
                'title' => 'Ordenar columnas',
                'text' => 'Haz clic en el encabezado de cualquier columna (Tipo, Contenido o Fecha) para ordenar las notificaciones:',
                'list' => [
                    'asc' => '<strong>Primer clic:</strong> Ordena de forma ascendente (A→Z, más antigua→más reciente)',
                    'desc' => '<strong>Segundo clic:</strong> Ordena de forma descendente (Z→A, más reciente→más antigua)',
                    'visual' => '<strong>Indicador visual:</strong> Aparece una flechita que muestra el orden actual'
                ]
            ]
        ],
        'actions' => [
            'title' => 'Botones de acciones',
            'intro' => 'Cada notificación tiene <strong>dos botones</strong> en la columna "Acciones":',
            'details' => [
                'title' => 'Ver Detalles (botón azul con ícono de ojo)',
                'what' => '<strong>Qué hace:</strong> Abre una ventana emergente con toda la información completa de la notificación.',
                'when' => '<strong>Cuándo usarlo:</strong> Cuando quieres saber exactamente qué pasó, quién hizo el cambio, y más detalles.'
            ],
            'mark' => [
                'title' => 'Marcar como leída / Marcar como no leída',
                'desc' => 'Este botón cambia según si la notificación ya fue leída o no:',
                'unread_state' => [
                    'title' => 'Si la notificación NO ha sido leída:',
                    'list' => [
                        'visual' => 'Aparece un botón <strong>azul</strong> con un ícono de check',
                        'hover' => 'Dice "Marcar como leída" (al pasar el mouse)',
                        'action' => '<strong>Qué hace:</strong> Al hacer clic, marca la notificación como leída. El número en la campana disminuye.'
                    ]
                ],
                'read_state' => [
                    'title' => 'Si la notificación YA fue leída:',
                    'list' => [
                        'visual' => 'Aparece un botón <strong>gris</strong> con un ícono de X',
                        'hover' => 'Dice "Marcar como no leída" (al pasar el mouse)',
                        'action' => '<strong>Qué hace:</strong> Al hacer clic, marca la notificación como no leída nuevamente. El número en la campana aumenta.'
                    ]
                ]
            ]
        ],
        'modal' => [
            'title' => 'Ventana de detalles (Modal)',
            'intro' => 'Esta es la ventana emergente que aparece cuando haces clic en <strong>"Ver Detalles"</strong>.',
            'look' => [
                'title' => 'Cómo se ve',
                'desc' => 'La ventana aparece <strong>en el centro de la pantalla</strong>, con un fondo oscurecido detrás. Se divide en tres partes:',
                'part1' => [
                    'title' => '1. Parte superior (Título)',
                    'text' => 'Muestra el <strong>mensaje principal</strong> de la notificación. Por ejemplo: "Notificación". En la esquina superior derecha hay una <strong>X</strong> para cerrar la ventana.'
                ],
                'part2' => [
                    'title' => '2. Parte central (Contenido detallado)',
                    'text' => 'Aquí se muestra información completa que varía según el tipo de notificación:'
                ],
                'accordion' => [
                    'comment' => 'Si es un Comentario',
                    'comment_content' => "Se ha agregado un nuevo comentario en tu ticket\n\n────────────────────────────────────────\n\nComentario de: Iván\nEn ticket: \"Ticket de prueba 3\"\nComentario: \"Este es un comentario de ejemplo del administrador\"\n\n────────────────────────────────────────\n\nFecha: 13/06/2025 11:20     [Ver Ticket]",
                     'status' => 'Si es un Cambio de Estado',
                     'status_content' => "El ticket con ID 22 ha sido actualizado\n\n────────────────────────────────────────\n\nTicket: \"No se puede iniciar sesión\"\nNuevo estado: En Proceso\nPrioridad: Alta\nActualizado por: Admin Iván\n\n────────────────────────────────────────\n\nFecha: 12/06/2025 09:30     [Ver Ticket]",
                     'created' => 'Si es un Ticket Creado',
                     'created_content' => "Nuevo ticket creado con ID 29\n\n────────────────────────────────────────\n\nCreado por: Luis\nTicket: \"Error al guardar archivo\"\n\n────────────────────────────────────────\n\nFecha: 10/06/2025 14:22     [Ver Ticket]",
                     'closed' => 'Si es un Ticket Cerrado',
                     'closed_content' => "El ticket ha sido cerrado\n\n────────────────────────────────────────\n\nTicket cerrado: \"Problema con la base de datos\"\nCerrado por: Admin Carlos\n\n────────────────────────────────────────\n\nFecha: 08/06/2025 16:45     [Ver Ticket]",
                     'reopened' => 'Si es un Ticket Reabierto',
                     'reopened_content' => "El ticket ha sido reabierto\n\n────────────────────────────────────────\n\nTicket reabierto: \"Solicitud de nueva funcionalidad\"\nReabierto por: Luis\n\n────────────────────────────────────────\n\nFecha: 09/06/2025 10:15     [Ver Ticket]"
                ],
                'part3' => [
                    'title' => '3. Parte inferior (Botones)',
                    'text' => 'Siempre hay un botón <strong>"Cerrar"</strong> (gris) que cierra la ventana y te devuelve a la tabla de notificaciones. Si la notificación está relacionada con un ticket específico, también aparece un botón <strong>"Ver Ticket"</strong> que te lleva directamente a ese ticket.'
                ]
            ]
        ],
        'example' => [
            'title' => 'Ejemplo de uso completo',
            'intro' => 'Imagina esta situación paso a paso:',
            'step1' => [
                'title' => '1. Recibes una notificación',
                'text' => 'Un administrador comenta en tu ticket. Automáticamente: El icono de campana en la parte superior muestra un número en círculo amarillo (cuántas notificaciones nuevas tienes).'
            ],
            'step2' => [
                'title' => '2. Abres las notificaciones',
                'text' => 'Haces clic en la campana y llegas a la tabla de notificaciones. Ves una fila nueva con: Tipo, Contenido, Fecha.'
            ],
            'step3' => [
                'title' => '3. Ves los detalles',
                'text' => 'Haces clic en el botón azul con el ojo (Ver detalles). Se abre la ventana emergente que muestra toda la información detallada.'
            ],
            'step4' => [
                'title' => '4. Vas al ticket',
                'text' => 'Haces clic en <strong>"Ver Ticket"</strong> en la ventana emergente. Te lleva directamente a la página de ese ticket (donde puedes leer y responder).'
            ],
            'step5' => [
                'title' => '5. Marcas como leída',
                'text' => 'Vuelves a las notificaciones y haces clic en el botón azul de check (Marcar como leída). Ahora el botón se vuelve gris con una X y el contador de la campana disminuye.'
            ]
        ],
        'empty' => [
            'title' => 'Si no tienes notificaciones',
            'text' => 'Cuando entras a esta sección y no tienes ninguna notificación, verás un mensaje:<br><br><i class="fas fa-info-circle"></i> No tienes notificaciones.<br><br>Esto significa que todo está tranquilo: no ha habido cambios en tus tickets recientemente.'
        ],
        'language' => [
            'title' => 'Cambio de idioma',
            'text' => 'Toda la sección de notificaciones está disponible en <strong>Español</strong> e <strong>Inglés</strong>. Para cambiar el idioma, usa el selector <strong>ES</strong> / <strong>EN</strong> en la barra superior de navegación. Los textos que cambian incluyen: Títulos, Botones, Mensajes, Opciones de búsqueda.'
        ]
    ],
    'profile_page' => [
        'title' => 'Ayuda · Mi Perfil',
        'header' => 'Gestión del Perfil y Cuenta',
        'breadcrumbs' => 'Perfil',
        'info' => [
            'title' => 'Ver mi Información',
            'text1' => 'Para acceder a tus datos personales registrados en la aplicación:',
            'step1' => 'Haz clic en tu <strong>Nombre</strong> en la esquina superior derecha (barra superior).',
            'step2' => 'Selecciona la opción <strong>"Mi Perfil"</strong> en el menú desplegable.',
            'text2' => 'En esta pantalla podrás visualizar:',
            'list' => [
                'name' => '<strong>Nombre Completo:</strong> Tal como figura en el sistema.',
                'email' => '<strong>Correo Electrónico:</strong> Tu dirección de email vinculada para notificaciones.',
                'tickets' => '<strong>Tickets Creados:</strong> Un contador histórico de todas tus solicitudes.'
            ]
        ],
        'edit' => [
            'title' => '¿Cómo edito mis datos?',
            'text1' => 'Actualmente, la edición directa de nombre o correo electrónico está deshabilitada por razones de seguridad y consistencia de datos corporativos.',
            'text2' => 'Si detectas un error en tu información o necesitas actualizar tu email, por favor <strong>crea un ticket</strong> de tipo "Consulta" o "Administrativo" solicitando el cambio al equipo de soporte.'
        ],
        'security' => [
            'title' => 'Seguridad y Sesión',
            'logout_title' => 'Cerrar Sesión',
            'logout_text' => 'Si utilizas un ordenador compartido o público, es crucial que cierres tu sesión al terminar.',
            'logout_step1' => 'Haz clic en el icono de <strong>"Puerta"</strong> o "Cerrar Sesión" en la barra superior derecha.',
            'logout_step2' => 'O despliega el menú de usuario y selecciona "Salir".',
            'password_title' => 'Cambio de Contraseña',
            'password_text' => 'Si has olvidado tu contraseña o deseas cambiarla, deberás utilizar el enlace "¿Olvidaste tu contraseña?" en la pantalla de inicio de sesión, o contactar con un administrador para que te envíe un enlace de restablecimiento.'
        ],
        'language' => [
            'title' => 'Idioma',
            'text' => 'La aplicación está disponible en varios idiomas (Español e Inglés). Puedes cambiar el idioma de la interfaz en cualquier momento usando el selector (icono de bandera) situado en la barra superior.'
        ]
    ],
    'admin_intro_page' => [
        'title' => 'Manual Admin · Introducción',
        'header' => '1. Introducción y Entorno de Trabajo',
        'subtitle' => 'Manual de referencia técnico y operativo detallado para la administración del sistema Service Desk.',
        'toc' => [
            'header' => 'Índice del Manual',
            'intro' => '1. Introducción',
            'tickets' => '2. Gestión de Tickets',
            'users' => '3. Administración de Usuarios',
            'notifications' => '4. Sistema de Notificaciones',
            'events' => '5. Auditoría y Eventos',
            'doc_info' => 'Documentación Técnica v2.2 - Revisión Extendida'
        ],
        'section_1' => [
            'title' => '1.1. Propósito y Arquitectura de Seguridad (Multi-Auth)',
            'text' => 'El módulo de administración es el componente central para la gestión ("Backend") del sistema de soporte técnico. A diferencia de los paneles de administración convencionales, este sistema ha sido construido sobre una arquitectura de <strong>Autenticación Dual (Multi-Auth)</strong> y aislamiento de sesiones.',
            'text_2' => 'Esto implica que el entorno de administración es técnicamente invisible e inaccesible para los usuarios finales. Utiliza un "Guard" de seguridad independiente (admin) y tablas de base de datos segregadas para las credenciales, garantizando que una vulnerabilidad en una cuenta de usuario nunca comprometa el panel de control. El acceso está restringido exclusivamente a personal autorizado y auditado.',
            'roles_box' => [
                'title' => 'Políticas RBAC (Role-Based Access Control)',
                'text' => 'El sistema aplica una política de "Privilegio Mínimo" a través de roles definidos que determinan qué puede ver y hacer cada operador:',
                'superadmin' => '<strong>Super Admin (Root):</strong> Acceso irrestricto total. Es el único rol capaz de crear otros administradores, modificar la taxonomía del sistema (crear/borrar Tipos de Ticket), purgar registros y acceder a análisis de negocio globales. Este rol debe limitarse a los gerentes de TI.',
                'admin' => '<strong>Administrador Estándar (Agente):</strong> Rol enfocado puramente en la operatividad diaria. Tiene control total sobre el ciclo de vida de los tickets (responder, cerrar, reabrir) y gestión básica de usuarios (editar perfiles de cliente). No puede alterar la configuración estructural del sistema ni ver el log de auditoría global.',
                'security_note' => 'Seguridad: Todas las acciones críticas (logins, cambios de estado, borrados) quedan registradas permanentemente con dirección IP y timestamp en el Historial de Eventos para auditoría forense.'
            ]
        ],
        'section_2' => [
            'title' => '1.2. Interfaz de Aterrizaje: El Hub de Navegación',
            'text' => 'Al autenticarse en el panel, el sistema no dirige al operador a un dashboard lleno de métricas, sino al <strong>Hub de Navegación Operativa</strong>. Esta decisión de diseño (UX) busca minimizar la carga cognitiva inicial y enfocar al agente en la acción inmediata.',
            'text_2' => 'Desde este punto central, el flujo de trabajo se bifurca en dos caminos principales dependiendo del rol y la intención del usuario:',
            'img_caption' => 'Interfaz del Hub de Navegación priorizando flujos de trabajo',
            'buttons' => [
                'assigned' => '<strong>Tickets Asignados (Mi Cola de Trabajo):</strong> Este es el acceso más frecuente. Dirige al agente directamente a la lista filtrada de tickets donde él es el responsable. Permite retomar el trabajo pendiente inmediatamente sin navegar por menús.',
                'management' => '<strong>Gestión Global y Métricas (Dashboard):</strong> Reservado para Superadmins. Dirige al cuadro de mando analítico para supervisar la salud del servicio, volumen de carga y rendimiento del equipo.'
            ]
        ],
        'section_3' => [
            'title' => '1.3. Cuadro de Mando de Gestión (KPI Dashboard)',
            'subtitle' => 'Exclusivo para Superadmins',
            'text' => 'El Dashboard proporciona una visión macroscópica ("Helicopter View") del estado del servicio en tiempo real. Es vital para la toma de decisiones basada en datos y la detección temprana de cuellos de botella.',
            'text_2' => 'Los indicadores se calculan en vivo consultando la base de datos transaccional:',
            'kpis' => [
                'users' => [
                    'title' => 'Usuarios Registrados',
                    'desc' => 'Métrica de alcance. Indica el tamaño total de la base de clientes con acceso al portal de soporte.'
                ],
                'admins' => [
                    'title' => 'Fuerza Operativa',
                    'desc' => 'Capacidad de respuesta disponible. Suma de administradores y agentes activos en el sistema.'
                ],
                'assigned' => [
                    'title' => 'Carga Activa',
                    'desc' => 'Tickets que están actualmente en proceso (No cerrados) y tienen un responsable asignado. Un número alto aquí puede indicar saturación del equipo.'
                ],
                'total' => [
                    'title' => 'Volumen Histórico',
                    'desc' => 'Total acumulado de incidencias procesadas desde el despliegue del sistema. Útil para medir la demanda a largo plazo.'
                ]
            ],
            'events_widget' => [
                'title' => 'Monitor de Seguridad en Vivo',
                'text' => 'En la zona inferior del dashboard se despliega el widget de <strong>Últimos Eventos del Sistema</strong>. Esta lista se actualiza con cada acción crítica y permite al Superadmin detectar patrones anómalos, como múltiples intentos de login fallidos, creación de administradores no autorizada o cambios masivos en estados de tickets.'
            ]
        ],
        'section_4' => [
            'title' => '1.4. Mapa de Navegación (Sidebar)',
            'text' => 'La barra lateral izquierda es persistente y organiza las herramientas en tres grandes bloques lógicos:',
            'text_2' => 'Comprender esta estructura es clave para una navegación fluida:',
            'modules' => [
                'ops' => [
                    'title' => 'BLOQUE 1: OPERACIONES (El día a día)',
                    'dashboard' => '<strong>Dashboard / Inicio:</strong> Retorno rápido al Hub o al Cuadro de Mando.',
                    'tickets' => '<strong>Gestión de Tickets:</strong> El corazón del sistema. Despliega submenús para filtrar tickets por estado (Abiertos, Cerrados) o ver la lista global.',
                    'users' => '<strong>Usuarios:</strong> CRM ligero para buscar clientes, ver su historial de peticiones y editar sus datos de contacto.'
                ],
                'sys' => [
                    'title' => 'BLOQUE 2: SISTEMA (Configuración)',
                    'types' => '<strong>Tipos & Categorías:</strong> Permite definir la taxonomía de los problemas (ej. "Hardware", "Software"). Es fundamental para obtener reportes precisos.',
                    'events' => '<strong>Logs / Auditoría:</strong> Acceso al registro histórico completo e inmutable de acciones. Permite filtrar por fecha, usuario y tipo de acción.',
                    'admins' => '<strong>Gestión de Staff:</strong> (Solo Superadmin) Alta, baja y modificación de cuentas de otros administradores.'
                ],
                'personal' => [
                    'title' => 'BLOQUE 3: PERSONAL',
                    'logout' => '<strong>Perfil y Salida:</strong> En la zona inferior se encuentran los controles de sesión y visualización del perfil actual.'
                ]
            ]
        ]
    ],
    'admin_tickets_page' => [
        'title' => 'Gestión Técnica de Incidencias',
        'intro' => 'El módulo de tickets es el corazón operativo del Help Desk. Aquí se centraliza la comunicación con el usuario y se ejecutan los flujos de resolución. Esta guía detalla los procedimientos estándar para maximizar la eficiencia y cumplir con los acuerdos de nivel de servicio (SLA).',
        'lifecycle' => [
            'title' => '2.1. Ciclo de Vida y Estados del Ticket',
            'desc' => 'El sistema utiliza un autómata de estados estricto para gestionar el flujo de trabajo. Comprender estos estados es vital para mantener la bandeja de entrada organizada:',
            'status' => [
                'new' => '<strong>NUEVO (New):</strong> Estado inicial automático al crearse el ticket. Indica que nadie ha revisado el caso aún. Acción requerida: Triaje inmediato.',
                'open' => '<strong>ABIERTO (Open):</strong> El ticket ha sido asignado a un agente y se está trabajando en él. El SLA de resolución está activo y contando.',
                'pending' => '<strong>PENDIENTE (Pending):</strong> El agente ha solicitado información al usuario y está esperando respuesta. Este estado "congela" el contador del SLA hasta que el cliente contesta.',
                'solved' => '<strong>RESUELTO (Solved):</strong> El agente ha proporcionado una solución definitiva. El sistema enviará una notificación al usuario para que confirme la resolución.',
                'closed' => '<strong>CERRADO (Closed):</strong> Estado final inmutable. El ticket se archiva y no admite nuevas respuestas. Solo puede ser consultado como histórico.',
            ],
            'flow_title' => 'Flujo de Trabajo Recomendado',
            'flow_text' => 'Para una gestión eficiente, se recomienda no dejar tickets en estado "Nuevo" por más de 1 hora. Si la resolución no es inmediata, cambie el estado a "Abierto" para indicar que está siendo procesado, o "Pendiente" si el bloqueo está en el lado del cliente.'
        ],
        'triage' => [
            'title' => '2.2. Protocolos de Asignación y Triaje',
            'desc' => 'El Triaje es el proceso de categorización y asignación inicial. Un ticket mal asignado aumenta drásticamente el tiempo de resolución (TTR).',
            'manual' => '<strong>Asignación Directa (Push):</strong> Un supervisor o dispatcher revisa la cola de "Nuevos" y asigna manualmente el ticket al especialista más adecuado según la categoría (Hardware, Software, Redes).',
            'claim' => '<strong>Auto-Asignación (Pull):</strong> En equipos ágiles, los agentes toman proactivamente los tickets de la bolsa general ("Pool") utilizando el botón "Asignarme a mí".',
            'filters_title' => 'Filtrado de Colas',
            'filters_text' => 'Utilice los filtros superiores de la bandeja de entrada para alternar entre "Mis Tickets" (su responsabilidad directa), "Tickets sin Asignar" (oportunidades de trabajo) y "Todos" (supervisión global).'
        ],
        'sla' => [
            'title' => '2.3. Matriz de Prioridad y SLA',
            'desc' => 'La prioridad define la urgencia del ticket y sus tiempos de respuesta esperados. El sistema puede enviar alertas si estos tiempos se violan.',
            'high' => [
                'tag' => 'ALTA (Crítico)',
                'desc' => 'Incidencias que detienen la operación crítica del negocio o afectan a múltiples usuarios.',
                'time' => 'Tiempos Meta: Respuesta < 1h | Resolución < 4h'
            ],
            'medium' => [
                'tag' => 'MEDIA (Normal)',
                'desc' => 'Degradación del servicio que no detiene la operación, o problemas funcionales para un único usuario.',
                'time' => 'Tiempos Meta: Respuesta < 4h | Resolución < 24h'
            ],
            'low' => [
                'tag' => 'BAJA (Consulta)',
                'desc' => 'Peticiones de información, dudas o sugerencias que no afectan la funcionalidad del sistema.',
                'time' => 'Tiempos Meta: Respuesta < 24h | Resolución < 72h'
            ]
        ],
        'features' => [
            'title' => '2.4. Herramientas de Resolución',
            'desc' => 'Dentro de la vista de detalle del ticket, el agente dispone de un set de herramientas para interactuar:',
            'reply' => '<strong>Respuesta Pública:</strong> Envía un correo electrónico al cliente. Use esto para pedir datos o dar soluciones. Se admite formato enriquecido (negritas, listas, enlaces).',
            'notes' => '<strong>Notas Internas (Privado):</strong> Permite dejar comentarios que SOLO verán otros agentes. Ideal para documentar pasos técnicos, dejar bitácora de llamadas o pedir consejo a compañeros sin alertar al cliente.',
            'files' => '<strong>Adjuntos del Sistema:</strong> Puede subir logs, capturas de pantalla o documentos PDF. El sistema escanea y bloquea extensiones peligrosas (.exe, .sh) automáticamente.'
        ]
    ],
    'admin_users_page' => [
        'title' => 'Administración de Identidad y Accesos (IAM)',
        'intro' => 'Control de cuentas de usuario, roles y permisos de acceso al sistema.',
        'types' => [
            'title' => '3.1. Tipología de Cuentas',
            'desc' => 'El sistema distingue estrictamente entre dos tipos de actores por razones de seguridad y operatividad. Ambos tienen accesos y portales diferenciados.',
            'client_title' => 'Usuario Final (Client)',
            'client_desc' => 'Empleados o clientes que requieren asistencia técnica. Acceden exclusivamente al Portal de Usuario para crear tickets.',
            'admin_title' => 'Administrador (Staff)',
            'admin_desc' => 'Personal técnico encargado de resolver incidencias. Acceden al Panel de Administración (Backoffice) para gestionar operaciones.',
        ],
        'manage_users' => [
            'title' => '3.2. Gestión de Usuarios Finales',
            'desc' => 'Operaciones estándar de administración para la base de datos de clientes.',
            'create' => [
                'title' => 'Alta de Nuevo Usuario',
                'steps' => [
                    '1' => 'Navegue a <strong>Usuarios > Crear Nuevo</strong>.',
                    '2' => 'Complete los campos obligatorios: Nombre completo y Correo electrónico corporativo.',
                    '3' => 'Establezca una contraseña temporal segura.',
                ]
            ],
            'password' => [
                'title' => 'Restablecimiento de Contraseñas',
                'desc' => 'Para resetear, edite el usuario y escriba la nueva clave. Si deja el campo vacío, se mantendrá la actual.'
            ]
        ],
        'superadmin' => [
            'title' => '3.3. Gestión de Staff (Solo Superadmin)',
            'desc' => 'Área restringida para la elevación de privilegios y creación de nuevos agentes de soporte.',
            'warning' => 'Otorgar permisos de administrador permite acceso a datos sensibles de tickets y usuarios. Proceda con cautela.'
        ]
    ],
    'admin_notifications_page' => [
        'title' => 'Documentación - Notificaciones de Administrador',
        'intro' => 'El sistema de notificaciones te mantiene informado automáticamente sobre todos los eventos importantes que ocurren en la plataforma. Como administrador, recibes avisos sobre nuevos tickets creados por usuarios, comentarios añadidos, y cualquier actividad relevante que requiera tu atención o seguimiento.',
        'intro_more' => 'Esto te permite gestionar el flujo de trabajo de manera eficiente sin tener que revisar manualmente cada sección del sistema.',
        'access' => [
            'title' => 'Cómo acceder a las notificaciones',
            'desc' => 'Hay <strong>dos formas</strong> de acceder a tus notificaciones como administrador:',
            'op1' => [
                'title' => 'Opción 1: Desde el icono de la campana',
                'desc' => 'En la <strong>parte superior derecha</strong> de la pantalla, en la barra de navegación, encontrarás un icono de campana.',
                'alert' => [
                    'title' => 'Indicador de notificaciones nuevas:',
                    'li1' => 'Si tienes notificaciones sin leer, aparece un <strong>círculo amarillo con un número</strong> que indica cuántas notificaciones nuevas tienes.',
                    'li2' => 'Ejemplo: Si ves un "12" sobre la campana, significa que tienes 12 notificaciones pendientes de revisar.'
                ],
                'action' => '<strong>Para acceder:</strong> Haz clic en el icono de la campana y serás redirigido a la página completa de notificaciones.'
            ],
            'op2' => [
                'title' => 'Opción 2: Desde el menú lateral',
                'desc' => 'En el menú de navegación del lado izquierdo del panel de administración, busca la opción <strong>"Notificaciones"</strong> (con un icono de campana). Haz clic ahí para acceder directamente.'
            ]
        ],
        'screen' => [
            'title' => 'La pantalla de notificaciones',
            'intro' => 'Cuando accedes a esta sección, verás:',
            'loc' => [
                'title' => 'Ubicación en el sistema',
                'desc' => 'En la parte superior aparece una ruta de navegación que te muestra dónde estás:',
                'path' => 'Inicio / Notificaciones',
                'note' => 'Puedes hacer clic en "Inicio" para volver al panel de administración principal.'
            ],
            'table' => [
                'title' => 'La tabla de notificaciones',
                'desc' => 'Todas las notificaciones se muestran en una <strong>tabla organizada</strong> con <strong>4 columnas</strong>:',
                'cols' => [
                    'h1' => 'Columna', 'h2' => 'Qué muestra', 'h3' => 'Ejemplo',
                    'r1c1' => 'Tipo', 'r1c2' => 'El tipo de evento que ocurrió', 'r1c3' => 'Comentario, Creado, Estado',
                    'r2c1' => 'Contenido', 'r2c2' => 'Un resumen de lo que pasó', 'r2c3' => '"Se ha creado un nuevo ticket" o "Nuevo comentario en ticket ID 22"',
                    'r3c1' => 'Fecha', 'r3c2' => 'Cuándo ocurrió el evento', 'r3c3' => '13/06/2025 11:14',
                    'r4c1' => 'Acciones', 'r4c2' => 'Botones para interactuar', 'r4c3' => 'Ver detalles, Marcar como leída/no leída',
                ],
                'warn' => '<strong>Importante:</strong> Las notificaciones se ordenan de la más reciente a la más antigua por defecto, para que siempre veas primero los eventos más actuales.'
            ]
        ],
        'types' => [
            'title' => 'Tipos de notificaciones que recibes como administrador',
            'new' => [
                'title' => 'Nuevo Ticket Creado',
                'when' => '<strong>Cuándo la recibes:</strong> Cuando un usuario crea un nuevo ticket en el sistema.',
                'what' => '<strong>Qué dice:</strong> "Se ha creado un nuevo ticket" o "Nuevo ticket creado con ID [número] por [nombre usuario]"',
                'info' => '<strong>Información adicional que muestra:</strong>',
                'li1' => 'Nombre del usuario que creó el ticket', 'li2' => 'Título del ticket', 'li3' => 'ID del ticket',
                'why' => '<strong>Por qué es útil:</strong> Te alerta inmediatamente cuando hay una nueva solicitud que debe ser atendida, permitiéndote asignarla o comenzar a trabajar en ella sin demora.'
            ],
            'comment' => [
                'title' => 'Nuevo Comentario en Ticket',
                'when' => '<strong>Cuándo la recibes:</strong> Cuando un usuario añade un comentario a un ticket que estás gestionando o que te ha sido asignado.',
                'what' => '<strong>Qué dice:</strong> "Nuevo comentario en ticket ID [número] por [nombre usuario]"',
                'info' => '<strong>Información adicional que muestra:</strong>',
                'li1' => 'Autor del comentario (nombre del usuario)', 'li2' => 'Título del ticket', 'li3' => 'Contenido del comentario', 'li4' => 'ID del ticket',
                'why' => '<strong>Por qué es útil:</strong> Te mantiene al tanto de las respuestas de los usuarios, información adicional que proporcionan, o seguimiento que hacen a sus tickets. Puedes responder rápidamente sin tener que revisar cada ticket individualmente.'
            ],
            'status' => [
                'title' => 'Cambio de Estado de Ticket',
                'when' => '<strong>Cuándo la recibes:</strong> Cuando otro administrador cambia el estado de un ticket (especialmente útil en equipos con múltiples administradores).',
                'what' => '<strong>Qué dice:</strong> "El ticket con ID [número] ha sido actualizado a [nuevo estado]"',
                'info' => '<strong>Información adicional que muestra:</strong>',
                'li1' => 'Título del ticket', 'li2' => 'Nuevo estado (Pendiente, En Proceso, Resuelto)', 'li3' => 'Prioridad actual', 'li4' => 'Quién actualizó el ticket',
                'why' => '<strong>Por qué es útil:</strong> Mantiene la coordinación entre administradores, evitando que dos personas trabajen en el mismo ticket o que se dupliquen esfuerzos.'
            ],
            'closed' => [
                'title' => 'Ticket Cerrado',
                'when' => '<strong>Cuándo la recibes:</strong> Cuando un ticket es marcado como cerrado (ya sea por ti o por otro administrador).',
                'what' => '<strong>Qué dice:</strong> "El ticket [título] ha sido cerrado"',
                'info' => '<strong>Información adicional que muestra:</strong>',
                'li1' => 'Título del ticket cerrado', 'li2' => 'Quién cerró el ticket',
                'why' => '<strong>Por qué es útil:</strong> Permite llevar un registro de tickets completados y mantener visibilidad sobre qué casos se están resolviendo.'
            ],
            'reopened' => [
                'title' => 'Ticket Reabierto',
                'when' => '<strong>Cuándo la recibes:</strong> Cuando un ticket previamente cerrado se vuelve a abrir porque el problema no fue resuelto completamente o reapareció.',
                'what' => '<strong>Qué dice:</strong> "El ticket [título] ha sido reabierto"',
                'info' => '<strong>Información adicional que muestra:</strong>',
                'li1' => 'Título del ticket reabierto', 'li2' => 'Quién reabrió el ticket (usuario o administrador)',
                'why' => '<strong>Por qué es útil:</strong> Te alerta sobre problemas recurrentes que necesitan atención adicional.'
            ]
        ],
        'tools' => [
            'title' => 'Herramientas de la tabla',
            'intro' => 'La tabla de notificaciones incluye varias funciones avanzadas para ayudarte a gestionar y encontrar información rápidamente:',
            'search' => [
                'title' => 'Búsqueda',
                'desc' => 'En la esquina superior derecha de la tabla hay un campo que dice <strong>"Buscar:"</strong>',
                'li1' => 'Escribe cualquier palabra clave (por ejemplo, "comentario", un nombre de usuario, o parte del título de un ticket)',
                'li2' => 'La tabla filtra automáticamente y muestra solo las notificaciones que coinciden con tu búsqueda',
                'li3' => 'Borra el texto para ver todas las notificaciones nuevamente',
                'li4' => 'La búsqueda funciona en tiempo real: verás los resultados mientras escribes',
                'tip' => '<strong>Consejo:</strong> Usa la búsqueda para encontrar rápidamente todas las notificaciones relacionadas con un usuario específico o un ticket concreto.'
            ],
            'records' => [
                'title' => 'Cantidad de registros por página',
                'desc' => 'En la esquina superior izquierda verás <strong>"Mostrar 10 registros"</strong> (con un menú desplegable). Puedes cambiar cuántas notificaciones ver en cada página:',
                'li1' => '10 registros (valor por defecto)', 'li2' => '25 registros', 'li3' => '50 registros', 'li4' => '100 registros',
                'note' => 'Esto es especialmente útil cuando tienes muchas notificaciones acumuladas y quieres verlas todas de una vez sin cambiar de página constantemente.'
            ],
            'pagination' => [
                'title' => 'Paginación',
                'desc' => 'Si tienes más notificaciones de las que caben en una página, verás en la parte inferior de la tabla:',
                'example' => 'Mostrando 1 a 10 de 45 registros [Anterior] [1] [2] [3] [4] [5] [Siguiente]',
                'li1' => '<strong>Botón "Anterior":</strong> Retrocede a la página previa',
                'li2' => '<strong>Botón "Siguiente":</strong> Avanza a la siguiente página',
                'li3' => '<strong>Números de página:</strong> Salta directamente a una página específica haciendo clic en su número',
                'li4' => '<strong>Indicador de registros:</strong> Te muestra cuántas notificaciones hay en total y cuáles estás viendo actualmente'
            ],
            'sort' => [
                'title' => 'Ordenar columnas',
                'desc' => 'Haz clic en el encabezado de cualquier columna ordenable (Tipo, Contenido o Fecha) para cambiar el orden de las notificaciones:',
                'li1' => '<strong>Primer clic:</strong> Ordena de forma ascendente (A→Z para texto, más antigua→más reciente para fechas)',
                'li2' => '<strong>Segundo clic:</strong> Ordena de forma descendente (Z→A para texto, más reciente→más antigua para fechas)',
                'li3' => '<strong>Tercer clic:</strong> Vuelve al orden por defecto',
                'li4' => '<strong>Indicador visual:</strong> Aparece una flecha (↑ o ↓) en el encabezado que muestra el orden actual',
                'tip' => '<strong>Sugerencia:</strong> Ordena por fecha de forma descendente para ver siempre las notificaciones más recientes primero, que suelen ser las más importantes.'
            ]
        ],
        'actions' => [
            'title' => 'Botones de acciones',
            'intro' => 'Cada notificación en la tabla tiene <strong>dos botones</strong> en la columna "Acciones" que te permiten interactuar con ella:',
            'view' => [
                'title' => 'Ver Detalles (botón azul con ícono de ojo)',
                'what' => '<strong>Qué hace:</strong> Abre una ventana emergente (modal) con toda la información detallada de la notificación.',
                'when' => '<strong>Cuándo usarlo:</strong>',
                'li1' => 'Cuando necesitas conocer todos los detalles del evento', 'li2' => 'Para ver quién realizó la acción', 'li3' => 'Para leer el contenido completo de un comentario', 'li4' => 'Para acceder directamente al ticket relacionado mediante el botón "Ver Ticket"',
                'look' => '<strong>Apariencia:</strong> Botón pequeño de color azul turquesa con un ícono de ojo blanco.'
            ],
            'mark' => [
                'title' => 'Marcar como leída / Marcar como no leída',
                'intro' => 'Este botón tiene dos estados y cambia según si la notificación ya fue leída o no:',
                'unread' => [
                    'title' => 'Notificación NO leída',
                    'look' => '<strong>Aspecto:</strong> Botón <strong>azul</strong> con un ícono de check (✓)',
                    'hover' => '<strong>Texto al pasar el mouse:</strong> "Marcar como leída"',
                    'action' => '<strong>Qué hace al hacer clic:</strong>',
                    'li1' => 'Marca la notificación como leída', 'li2' => 'El botón cambia a gris (estado leída)', 'li3' => 'El contador en la campana de la barra superior disminuye', 'li4' => 'La tabla se actualiza automáticamente sin recargar la página'
                ],
                'read' => [
                    'title' => 'Notificación YA leída',
                    'look' => '<strong>Aspecto:</strong> Botón <strong>gris</strong> con un ícono de X (✖)',
                    'hover' => '<strong>Texto al pasar el mouse:</strong> "Marcar como no leída"',
                    'action' => '<strong>Qué hace al hacer clic:</strong>',
                    'li1' => 'Marca la notificación como no leída', 'li2' => 'El botón cambia a azul (estado no leída)', 'li3' => 'El contador en la campana de la barra superior aumenta', 'li4' => 'La tabla se actualiza automáticamente'
                ],
                'note' => '<strong>Nota:</strong> Marcar notificaciones como no leídas es útil cuando necesitas recordar revisar algo más tarde o mantener visible un evento importante.'
            ]
        ],
        'modal' => [
            'title' => 'Ventana de detalles (Modal)',
            'intro' => 'Esta es la ventana emergente que aparece cuando haces clic en <strong>"Ver Detalles"</strong> en cualquier notificación.',
            'how' => 'La ventana se superpone sobre la pantalla actual con un <strong>fondo oscurecido</strong> detrás, centrando tu atención en la información de la notificación.',
            'p1' => [
                'title' => '1. Parte superior (Título)',
                'desc' => 'Muestra el <strong>mensaje principal</strong> de la notificación. Ejemplos:',
                'li1' => '"Notificación"', 'li2' => '"Nuevo comentario en tu ticket"', 'li3' => '"Ticket actualizado"',
                'note' => 'En la esquina superior derecha hay una <strong>X</strong> que permite cerrar la ventana en cualquier momento.'
            ],
            'p2' => [
                'title' => '2. Parte central (Contenido detallado)',
                'desc' => 'El contenido de esta sección <strong>varía dinámicamente</strong> según el tipo de notificación. A continuación se muestran ejemplos de cada tipo:'
            ],
            'examples' => [ // Accordion content
                'new' => [
                    'title' => 'Ejemplo: Nuevo Ticket Creado',
                    'h' => 'Se ha creado un nuevo ticket',
                    'p1' => 'Creado por: Luis',
                    'p2' => 'Ticket: "Error al guardar archivo"',
                    'why' => '¿Qué ves aquí? El nombre del usuario que creó el ticket y el título de su solicitud. El botón "Ver Ticket" te lleva directamente al ticket completo.'
                ],
                'comment' => [
                    'title' => 'Ejemplo: Nuevo Comentario',
                    'h' => 'Nuevo comentario en ticket ID 17',
                    'p1' => 'Comentario de: Iván (Usuario)',
                    'p2' => 'En ticket: "Ticket de prueba 3"',
                    'p3' => 'Comentario: "Necesito más información sobre este error. ¿Podrían ayudarme?"',
                    'why' => '¿Qué ves aquí? Quién escribió el comentario, en qué ticket lo hizo, y el texto completo del mensaje. Puedes responder directamente desde el ticket.'
                ],
                'status' => [
                    'title' => 'Ejemplo: Cambio de Estado',
                    'h' => 'El ticket con ID 22 ha sido actualizado',
                    'p1' => 'Ticket: "No se puede iniciar sesión"',
                    'p2' => 'Nuevo estado: En Proceso',
                    'p3' => 'Prioridad: Alta',
                    'p4' => 'Actualizado por: Admin Carlos',
                    'why' => '¿Qué ves aquí? Información sobre qué administrador cambió el estado, cuál es el nuevo estado, y la prioridad actual del ticket.'
                ],
                'closed' => [
                    'title' => 'Ejemplo: Ticket Cerrado',
                    'h' => 'El ticket ha sido cerrado',
                    'p1' => 'Ticket cerrado: "Problema con la base de datos"',
                    'p2' => 'Cerrado por: Admin María',
                    'why' => '¿Qué ves aquí? Qué ticket fue cerrado y qué administrador completó la acción.'
                ],
                'reopened' => [
                    'title' => 'Ejemplo: Ticket Reabierto',
                    'h' => 'El ticket ha sido reabierto',
                    'p1' => 'Ticket reabierto: "Solicitud de nueva funcionalidad"',
                    'p2' => 'Reabierto por: Luis (Usuario)',
                    'why' => '¿Qué ves aquí? Información sobre qué ticket fue reabierto y quién lo reabrió (puede ser un usuario o un administrador).'
                ]
            ],
            'p3' => [
                'title' => '3. Parte inferior (Botones)',
                'b1' => '<strong>Botón "Cerrar"</strong> (gris):',
                'b1_li1' => 'Cierra la ventana emergente', 'b1_li2' => 'Te devuelve a la tabla de notificaciones', 'b1_li3' => 'Ubicado en la esquina inferior derecha',
                'b2' => '<strong>Botón "Ver Ticket"</strong> (azul con ícono de ticket):',
                'b2_li1' => 'Aparece solo si la notificación está relacionada con un ticket específico', 'b2_li2' => 'Te redirige directamente a la página completa del ticket', 'b2_li3' => 'Desde ahí puedes ver todos los detalles, comentar, cambiar estado, o asignar el ticket'
            ]
        ],
        'workflow' => [
            'title' => 'Ejemplo de uso completo: Flujo de trabajo',
            'intro' => 'Imagina el siguiente escenario de tu día como administrador:',
            'step1' => [
                'title' => 'Paso 1: Recibes una notificación',
                'text' => 'Un usuario llamado "María" crea un nuevo ticket a las 09:15 AM con el título: "No puedo acceder a mi cuenta"',
                'auto' => 'Qué sucede automáticamente:',
                'li1' => 'El icono de campana en la barra superior muestra un círculo amarillo con el número 1', 'li2' => 'La notificación se registra en tu lista de notificaciones'
            ],
            'step2' => [
                'title' => 'Paso 2: Abres las notificaciones',
                'text' => 'Haces clic en el icono de campana y accedes a la tabla de notificaciones.',
                'see' => 'Lo que ves en la tabla:',
            ],
            'step3' => [
                'title' => 'Paso 3: Ves los detalles completos',
                'text' => 'Haces clic en el botón azul con el ojo.',
                'open' => 'Se abre la ventana emergente mostrando:',
            ],
            'step4' => [
                'title' => 'Paso 4: Accedes al ticket',
                'text' => 'Haces clic en el botón "Ver Ticket" dentro de la ventana emergente.',
                'happen' => 'Qué ocurre:',
                'li1' => 'Te redirige a la página completa del ticket', 'li2' => 'Puedes ver todos los detalles: descripción, prioridad, tipo de incidencia', 'li3' => 'Puedes asignar el ticket a ti mismo o a otro administrador', 'li4' => 'Puedes cambiar el estado o añadir un comentario de respuesta'
            ],
            'step5' => [
                'title' => 'Paso 5: Marcas la notificación como leída',
                'text' => 'Una vez que revisaste el ticket y tomaste acción, vuelves a las notificaciones. Haces clic en el botón azul de check (Marcar como leída).',
                'res' => 'Resultado:',
                'li1' => 'El botón cambia a gris con una X', 'li2' => 'El contador en la campana de la barra superior disminuye de 1 a 0', 'li3' => 'La notificación queda registrada como revisada'
            ]
        ],
        'special' => [
            'title' => 'Funciones especiales del administrador',
            'intro' => 'Como administrador, tienes acceso a una función adicional que los usuarios normales no tienen:',
            'mark_all' => [
                'title' => 'Marcar todas como leídas',
                'where' => '<strong>¿Dónde se encuentra?</strong> En la cabecera de la tarjeta de notificaciones, junto al título, puede aparecer un botón adicional.',
                'what' => '<strong>¿Qué hace?</strong> Marca todas tus notificaciones como leídas de una sola vez, sin necesidad de hacerlo una por una.',
                'when' => '<strong>¿Cuándo es útil?</strong>',
                'li1' => 'Cuando tienes muchas notificaciones acumuladas y ya las revisaste todas', 'li2' => 'Al finalizar tu jornada y quieres "limpiar" el panel', 'li3' => 'Cuando cambias de turno con otro administrador',
                'effect' => '<strong>Efecto:</strong> Todas las notificaciones pasan a estado "leída", todos los botones azules cambian a grises, y el contador de la campana vuelve a 0.'
            ]
        ],
        'empty' => [
            'title' => 'Si no tienes notificaciones',
            'text' => 'Cuando entras a esta sección y no tienes ninguna notificación registrada, verás un mensaje:',
            'msg' => 'No hay notificaciones disponibles.',
            'desc' => 'Esto significa que no ha habido actividad reciente en el sistema que requiera tu atención.'
        ],
        'diff' => [
            'title' => 'Diferencias con las notificaciones de usuario',
            'intro' => 'Las notificaciones que recibes como administrador son <strong>diferentes</strong> a las que reciben los usuarios normales:',
            'params' => [
                'p1' => 'Característica', 'p2' => 'Usuario Normal', 'p3' => 'Administrador',
                'r1c1' => 'Tipos de eventos', 'r1c2' => 'Solo sus propios tickets', 'r1c3' => 'Todos los tickets del sistema o asignados',
                'r2c1' => 'Nuevos tickets', 'r2c2' => 'Cuando él crea uno', 'r2c3' => 'Cuando cualquier usuario crea uno',
                'r3c1' => 'Comentarios', 'r3c2' => 'Solo en sus tickets', 'r3c3' => 'En tickets asignados o según configuración',
                'r4c1' => 'Volumen', 'r4c2' => 'Bajo (solo actividad propia)', 'r4c3' => 'Alto (actividad de toda la plataforma)',
                'r5c1' => 'Función adicional', 'r5c2' => 'No disponible', 'r5c3' => '"Marcar todas como leídas"'
            ]
        ],
        'language' => [
            'title' => 'Cambio de idioma',
            'text' => 'Toda la sección de notificaciones del panel de administración está disponible en <strong>Español</strong> e <strong>Inglés</strong>. Para cambiar el idioma, usa el selector <strong>ES</strong> / <strong>EN</strong> en la barra superior de navegación.',
            'list' => 'Los elementos que se traducen automáticamente incluyen: Encabezados de columnas, Mensajes del sistema, Botones, Controles de paginación, Opciones de registro, Contenido de las notificaciones.'
        ],
        'best_practices' => [
            'title' => 'Buenas prácticas',
            'intro' => 'Para aprovechar al máximo el sistema de notificaciones como administrador:',
            'do' => [
                'title' => 'Haz esto',
                'li1' => 'Revisa las notificaciones al inicio de tu jornada', 'li2' => 'Marca como leídas las notificaciones ya atendidas', 'li3' => 'Usa la búsqueda para encontrar notificaciones específicas', 'li4' => 'Haz clic en "Ver Ticket" para gestionar directamente desde la notificación', 'li5' => 'Mantén el contador de la campana bajo'
            ],
            'dont' => [
                'title' => 'Evita esto',
                'li1' => 'Ignorar las notificaciones durante días', 'li2' => 'Marcar como leídas sin revisar el contenido', 'li3' => 'Dejar acumular cientos de notificaciones sin leer', 'li4' => 'No usar la función "Marcar todas como leídas" al final del día', 'li5' => 'Olvidar responder a comentarios urgentes'
            ]
        ],
        'faq' => [
            'title' => 'Preguntas frecuentes',
            'q1' => '¿Puedo eliminar notificaciones?',
            'a1' => 'No, las notificaciones no se pueden eliminar manualmente. Esto garantiza que haya un registro completo de toda la actividad del sistema. Sin embargo, puedes marcarlas como leídas para "archivarlas" visualmente.',
            'q2' => '¿Las notificaciones se eliminan automáticamente después de un tiempo?',
            'a2' => 'No, todas las notificaciones se conservan permanentemente en el sistema. Esto permite mantener un historial completo y auditable de toda la actividad.',
            'q3' => '¿Puedo filtrar notificaciones por tipo?',
            'a3' => 'Sí, aunque depende de la configuración del sistema. Si está habilitado, verás un selector desplegable en la cabecera de la tabla que te permite filtrar por "Comentarios", "Tickets creados", "Cambios de estado", etc.',
            'q4' => '¿Recibo notificaciones de tickets que no me están asignados?',
            'a4' => 'Depende de tu nivel de permisos: <strong>Administrador normal:</strong> Recibes notificaciones principalmente de tickets asignados a ti. <strong>Superadministrador:</strong> Puedes recibir notificaciones de todos los tickets del sistema.',
            'q5' => '¿Qué pasa si marco una notificación como leída por error?',
            'a5' => 'No hay problema. Puedes volver a marcarla como no leída haciendo clic en el botón gris con la X. Esto hará que vuelva a aparecer en tu contador de notificaciones pendientes.'
        ],
        'summary' => [
            'title' => 'Resumen visual de la pantalla',
            'text' => 'Así se ve la estructura completa de la página de notificaciones:',
            'pre' => "┌────────────────────────────────────────────────────────────────────────┐\n│  Inicio / Notificaciones                                                │\n├────────────────────────────────────────────────────────────────────────┤\n│                                                                         │\n│  ┌──────────────────────────────────────────────────────────────────┐  │\n│  │ 🔔 Notificaciones                                                │  │\n│  ├──────────────────────────────────────────────────────────────────┤  │\n│  │                                                                  │  │\n│  │  Mostrar [10 ▼] registros         Buscar: [______________]      │  │\n│  │                                                                  │  │\n│  │  ┌──────────┬──────────────────────┬─────────────┬──────────┐  │  │\n│  │  │ Tipo     │ Contenido            │ Fecha       │ Acciones │  │  │
│  │  ├──────────┼──────────────────────┼─────────────┼──────────┤  │  │\n│  │  │ Creado   │ Nuevo ticket por...  │ 09/02 09:15 │ [👁][✓] │  │  │\n│  │  │ Comment  │ Comentario en ID 17..│ 09/02 10:30 │ [👁][✖] │  │  │\n│  │  │ Status   │ Ticket actualizado...│ 09/02 11:45 │ [👁][✓] │  │  │\n│  │  │ Closed   │ Ticket cerrado...    │ 08/02 16:20 │ [👁][✖] │  │  │\n│  │  └──────────┴──────────────────────┴─────────────┴──────────┘  │  │\n│  │                                                                  │  │\n│  │  Mostrando 1 a 4 de 45 registros     [◀] [1] 2 3 4 5 [▶]       │  │\n│  └──────────────────────────────────────────────────────────────────┘  │\n│                                                                         │\n└────────────────────────────────────────────────────────────────────────┘"
        ],
        'manage' => [
             'title' => 'Gestión eficiente de notificaciones',
             'intro' => 'Para administrar tu carga de trabajo de forma efectiva:',
             'strategy' => 'Estrategia por momentos del día',
             'morning' => 'Inicio de jornada (Mañana)',
             'm_li1' => 'Revisa todas las notificaciones no leídas', 'm_li2' => 'Prioriza los nuevos tickets según urgencia', 'm_li3' => 'Responde comentarios pendientes', 'm_li4' => 'Marca como leídas las notificaciones procesadas',
             'day' => 'Durante el día',
             'd_li1' => 'Mantén el icono de campana visible', 'd_li2' => 'Revisa notificaciones cada 1-2 horas', 'd_li3' => 'Atiende primero las de mayor prioridad',
             'end' => 'Fin de jornada',
             'e_li1' => 'Revisa que no queden notificaciones urgentes sin atender', 'e_li2' => 'Usa "Marcar todas como leídas" para limpiar el panel', 'e_li3' => 'Deja notas en tickets que requieran seguimiento al día siguiente'
        ]
    ],
    'admin_events_page' => [
        'title' => 'Historial de Eventos',
        'intro' => 'El módulo de auditoría actúa como la "Caja Negra" del sistema. Aquí se registra de forma inmutable cada acción crítica realizada por usuarios y administradores.',
        'interface' => [
            'title' => '1. Auditoría en Tiempo Real',
            'desc' => 'Panel de control forense. Proporciona una lista cronológica detallada de todas las operaciones del sistema.',
            'screenshot_alt' => 'Captura del historial de eventos mostrando las columnas de auditoría',
            'table_title' => 'Detalle de Columnas',
            'table' => [
                'type' => '<strong>Tipo de Evento:</strong> Código identificador de la acción (ej: <code>TICKET_CREATED</code>, <code>STATUS_CHANGED</code>).',
                'desc' => '<strong>Descripción:</strong> Resumen legible de lo ocurrido (ej: "Usuario X cambió el estado de Y a Z").',
                'user' => '<strong>Usuario (Actor):</strong> Identidad de quién ejecutó la acción. Muestra nombre y rol (Admin/User).',
                'date' => '<strong>Fecha:</strong> Marca de tiempo exacta de la ejecución.'
            ],
            'search_title' => 'Filtrado Forense',
            'search_desc' => 'La barra de búsqueda es capaz de encontrar eventos por ID de ticket (ej: "Ticket #504"), nombre de administrador o tipo de acción. Es vital para investigar incidentes pasados.'
        ],
        'concept' => [
            'title' => '2. Casos de Uso (Forenses)',
            'desc' => 'Este registro es inalterable (no se puede borrar ni editar), lo que garantiza la trazabilidad total. Ejemplos comunes de uso:',
            'scenarios' => [
                'case1' => [
                    'tit' => 'Investigación de "Ticket Desaparecido"',
                    'desc' => 'Si un ticket ya no aparece en el listado, busque el evento <code>TICKET_DELETED</code> para identificar qué administrador lo borró y cuándo.'
                ],
                'case2' => [
                    'tit' => 'Auditoría de SLAs',
                    'desc' => 'Compare la fecha de <code>TICKET_CREATED</code> con la primera <code>COMMENT_ADDED</code> para verificar tiempos reales de respuesta del personal.'
                ],
                'case3' => [
                    'tit' => 'Control de Accesos',
                    'desc' => 'Detecte picos inusuales de actividad o cambios de configuración no autorizados filtrando por nombre de usuario.'
                ]
            ]
        ]
    ]
];
