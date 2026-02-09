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
        'title' => 'Ayuda · Notificaciones',
        'header' => 'Sistema de Notificaciones',
        'breadcrumbs' => 'Notificaciones',
        'explanation' => [
            'title' => '¿Cómo funcionan?',
            'text1' => 'El sistema de notificaciones está diseñado para mantenerte informado en tiempo real sobre la actividad de tus tickets, sin que tengas que entrar a revisarlos uno por uno constantemente.',
            'text2' => 'Esta funcionalidad te permite desenfocarte de la aplicación y volver a ella solo cuando realmente hay novedades que requieren tu atención.',
            'list_intro' => 'Recibirás una notificación automática cuando:',
            'list' => [
                'reply' => 'Un administrador <strong>responda</strong> a uno de tus tickets (Nuevo comentario).',
                'status_change' => 'El <strong>estado</strong> de tu ticket cambie (ej. pasa de "Pendiente" a "Resuelto").',
                'assigned' => 'Se te asigne una acción específica o se requiera tu validación.',
                'event' => 'Se cree un evento importante relacionado con tu cuenta.'
            ]
        ],
        'management' => [
            'title' => 'Gestionar mis avisos',
            'bell_icon' => [
                'title' => '1. El Icono de La Campana',
                'text' => 'En la barra superior de la aplicación (arriba a la derecha), verás un icono de campana <i class="far fa-bell"></i>.',
                'img_caption' => 'Ejemplo de icono con alertas',
                'list' => [
                    'count' => 'Si tiene un número rojo <span class="badge badge-warning">3</span>, indica cuántas notificaciones <strong>no leídas</strong> tienes.',
                    'preview' => 'Al hacer clic en él, se despliega una vista rápida de las últimas alertas con un resumen breve.',
                    'view_all' => 'Desde ese desplegable puedes ir a "Ver todas las notificaciones".'
                ]
            ],
            'notifications_screen' => [
                'title' => '2. La Pantalla de "Mis Notificaciones"',
                'text' => 'Accediendo desde el menú lateral o desde "Ver todas" en la campana, llegarás a la lista completa.',
                'img_caption' => 'Ejemplo de pantalla de "Mis Notificaciones"',
                'actions_intro' => 'Aquí puedes realizar las siguientes acciones para organizar tu bandeja de entrada:',
                'actions' => [
                    'mark_read' => [
                        'dt' => 'Marcar como Leída',
                        'dd' => 'Si ya has visto el aviso, puedes marcarlo como leído. Esto hará que el contador rojo disminuya y la notificación se muestre visualmente como "ya vista" (generalmente con fondo blanco en lugar de gris/azul).<br>Busca el botón <i class="fas fa-check"></i> junto a la notificación.'
                    ],
                    'mark_unread' => [
                        'dt' => 'Marcar como No Leída',
                        'dd' => 'Si leíste una notificación por error pero quieres dejarla pendiente para revisarla luego con calma, puedes volver a marcarla como "No leída".'
                    ],
                    'go_to_ticket' => [
                        'dt' => 'Ir al Ticket',
                        'dd' => 'Esta es la acción más común. Al hacer clic en el texto o enlace de la notificación (ej. "Nuevo comentario en el ticket #123"), el sistema mostrará un modal, el cual mostrará la información de la notificación en detalle
                            junto con una opción <strong>"Ver Ticket"</strong>, que te llevará directamente a la pantalla del ticket correspondiente para que veas la novedad y respondas.'
                    ]
                ],
                'modal_caption' => 'Ejemplo de modal al hacer clic en una notificación'
            ]
        ],
        'tips' => [
            'title' => 'Consejos de Uso',
            'clean_inbox' => [
                'title' => '¡Mantén tu bandeja limpia!',
                'text' => 'Intenta marcar como leídas las notificaciones que ya has atendido. Esto te ayudará a identificar rápidamente cuando llegue algo realmente nuevo y urgente, evitando que se pierda entre avisos viejos.'
            ],
            'dont_ignore' => [
                'title' => 'No las ignores',
                'text' => 'Si recibes una notificación de "Ticket Resuelto", es muy importante que entres a validar la solución. Si ignoras estas notificaciones, tus tickets podrían quedarse "en el limbo" sin cerrarse oficialmente.'
            ]
        ],
        'faq' => [
            'title' => 'Preguntas Frecuentes',
            'email_q' => '¿Recibo correos electrónicos?',
            'email_a' => 'Sí, dependiendo de la configuración global del sistema, normalmente recibirás una copia de estas alertas en tu email registrado para que te enteres incluso si no estás logueado en la web.',
            'delete_q' => '¿Puedo borrar notificaciones permanentemente?',
            'delete_a' => 'El sistema generalmente guarda el historial de notificaciones para que puedas consultarlo en el futuro como referencia de actividad. Céntrate en usar el estado "Leído" para organizarte.'
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
        'subtitle' => 'Manual de referencia técnico y operativo para la administración del Service Desk.',
        'toc' => [
            'header' => 'Índice del Manual',
            'intro' => '1. Introducción',
            'tickets' => '2. Gestión de Tickets',
            'users' => '3. Administración de Usuarios',
            'notifications' => '4. Sistema de Notificaciones',
            'events' => '5. Auditoría y Eventos',
            'doc_info' => 'Documentación Técnica v2.0'
        ],
        'section_1' => [
            'title' => '1.1. Propósito y Arquitectura de Seguridad',
            'text' => 'Este módulo de administración constituye el núcleo de gestión ("Backend") del sistema de soporte. Ha sido diseñado bajo una arquitectura de <strong>Autenticación Dual (Multi-Auth)</strong>, lo que significa que opera en un entorno totalmente aislado del portal de usuarios.',
            'roles_box' => [
                'title' => 'Control de Acceso y Roles (RBAC)',
                'text' => 'El sistema implementa una estricta política de permisos basada en roles:',
                'superadmin' => '<strong>Super Admin:</strong> Posee privilegios de nivel "Root". Puede gestionar la infraestructura lógica (Tipos de Ticket, Eventos), administrar cuentas de otros administradores y visualizar métricas globales.',
                'admin' => '<strong>Administrador Estándar:</strong> Rol operativo enfocado en la resolución. Tiene acceso completo al ciclo de vida de los tickets y gestión básica de usuarios, pero carece de permisos para alterar la configuración del sistema.',
                'security_note' => 'Todas las acciones realizadas bajo estos roles son auditadas y registradas permanentemente en el Historial de Eventos.'
            ]
        ],
        'section_2' => [
            'title' => '1.2. Interfaz Principal: Hub de Navegación',
            'text' => 'Al autenticarse en el panel, el sistema presenta el <strong>Hub de Navegación</strong>. A diferencia de un dashboard tradicional, esta interfaz prioriza la velocidad de acceso a las colas de trabajo.',
            'img_caption' => 'Vista del Hub de Navegación del Administrador',
            'buttons' => [
                'assigned' => '<strong>Tickets Asignados (Workflows):</strong> Acceso directo a su carga de trabajo personal. Es la vista predeterminada para el trabajo diario.',
                'management' => '<strong>Gestión Global (Solo Superadmin):</strong> Acceso al Dashboard Analítico (KPIs) y gestión de usuarios.'
            ]
        ],
        'section_3' => [
            'title' => '1.3. Cuadro de Mando de Gestión (KPI Dashboard)',
            'subtitle' => 'Disponible para Superadmins',
            'text' => 'El panel de control analítico proporciona una visión macroscópica del estado del servicio. Utiliza agregación de datos en tiempo real para mostrar indicadores críticos.',
            'kpis' => [
                'users' => [
                    'title' => 'Usuarios Registrados',
                    'desc' => 'Total de cuentas de cliente activas en la base de datos.'
                ],
                'admins' => [
                    'title' => 'Fuerza Operativa',
                    'desc' => 'Total de administradores y agentes de soporte habilitados.'
                ],
                'assigned' => [
                    'title' => 'Tickets en Gestión',
                    'desc' => 'Volumen de tickets que actualmente tienen un agente asignado y están en progreso.'
                ],
                'total' => [
                    'title' => 'Volumen Histórico',
                    'desc' => 'Contador global de tickets procesados desde el inicio del servicio.'
                ]
            ],
            'events_widget' => [
                'title' => 'Widget de Auditoría en Vivo',
                'text' => 'En la parte inferior del dashboard se encuentra el <strong>Monitor de Eventos Recientes</strong>. Este componente muestra las últimas 5 acciones críticas del sistema (Logins, Creación de Admins, Cambios de Estado), permitiendo una supervisión de seguridad inmediata.'
            ]
        ],
        'section_4' => [
            'title' => '1.4. Estructura de Navegación del Sistema',
            'text' => 'La barra lateral (Sidebar) organiza los módulos funcionales en categorías lógicas para facilitar la operación:',
            'modules' => [
                'ops' => [
                    'title' => 'Módulo de Operaciones',
                    'dashboard' => '<strong>Dashboard:</strong> Retorno al Hub principal.',
                    'tickets' => '<strong>Gestión de Tickets:</strong> Bandeja de entrada y herramientas de resolución.',
                    'users' => '<strong>Usuarios:</strong> CRM básico de clientes.'
                ],
                'sys' => [
                    'title' => 'Módulo de Sistema',
                    'types' => '<strong>Tipos & Categorías:</strong> Configuración de taxonomía de tickets.',
                    'events' => '<strong>Logs del Sistema:</strong> Auditoría forense de acciones.',
                    'admins' => '<strong>Gestión de Staff:</strong> Administración de cuentas de agentes.'
                ]
            ]
        ]
    ],
    'admin_tickets_page' => [
        'title' => 'Gestión Técnica de Incidencias Operativas',
        'intro' => 'El módulo de gestión de tickets es el núcleo operativo de la plataforma. Esta sección define los protocolos para el manejo del ciclo de vida de las incidencias, desde la recepción hasta el cierre definitivo, garantizando el cumplimiento de los Niveles de Servicio (SLA).',
        'lifecycle' => [
            'title' => '2.1. Ciclo de Vida y Estados',
            'desc' => 'Cada incidencia transita por una máquina de estados finita que determina su visibilidad y las acciones permitidas.',
            'status' => [
                'new' => '<strong>NUEVO:</strong> Ticket recién creado. Requiere triaje inmediato. El SLA comienza a contar.',
                'open' => '<strong>ABIERTO:</strong> Asignado a un agente y en proceso de diagnóstico o resolución.',
                'pending' => '<strong>PENDIENTE:</strong> Esperando respuesta o información adicional por parte del cliente. Pausa temporalmente el SLA de resolución.',
                'solved' => '<strong>RESUELTO:</strong> El agente ha propuesto una solución. El cliente debe confirmar o reabrir si persiste el problema.',
                'closed' => '<strong>CERRADO:</strong> Finalización definitiva. El ticket pasa a modo solo lectura para auditoría.',
            ]
        ],
        'triage' => [
            'title' => '2.2. Protocolos de Triaje y Asignación',
            'desc' => 'La eficiencia del soporte depende de una correcta asignación de recursos. El sistema permite dos modalidades:',
            'manual' => '<strong>Asignación Manual:</strong> Los administradores pueden forzar la asignación de un ticket a cualquier agente disponible mediante el panel de control.',
            'claim' => '<strong>Self-Claim (Auto-asignación):</strong> Los agentes pueden tomar tickets de la cola global ("Pool") proactivamente.',
        ],
        'sla' => [
            'title' => '2.3. Matriz de Prioridad (SLA)',
            'desc' => 'Las prioridades determinan el orden de ejecución y los tiempos objetivo de respuesta (SLA).',
            'high' => '<strong>ALTA (Crítico):</strong> Interrupción total del servicio o problema de seguridad. TTR Objetivo: < 1 hora.',
            'medium' => '<strong>MEDIA (Normal):</strong> Funcionalidad parcial afectada o consultas operativas. TTR Objetivo: < 4 horas.',
            'low' => '<strong>BAJA (Consulta):</strong> Sugerencias, cambios estéticos o dudas no urgentes. TTR Objetivo: < 24 horas.',
        ]
    ]
];
