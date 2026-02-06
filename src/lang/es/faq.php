<?php

return [
    'faq' => [
        'help' => 'Ayuda',
        'intoduction_title' => 'Introducción',
        'notifications' => 'Notificaciones',
        'frequent_questions' => 'Preguntas frecuentes',
        'user' => [
            'what_is_system' => '¿Qué es este sistema?',
            'what_is_system_description' => 'Este es un sistema moderno de gestión de tickets de soporte. Fue diseñado para facilitar la comunicación entre usuarios que necesitan ayuda y un equipo de soporte profesional. Los usuarios crean tickets describiendo sus problemas, el equipo los analiza, resuelve y comunica la solución. Todo queda documentado para referencia futura.',
            
            'what_can_i_do' => '¿Qué puedo hacer en el sistema?',
            'what_can_i_do_description' => 'Como usuario, tienes acceso a múltiples funcionalidades: puedes crear tickets cuando necesites ayuda, describiendo tu problema en detalle; ver todos tus tickets anteriores para seguimiento; comentar en tus tickets para proporcionar información adicional o hacer seguimiento; recibir notificaciones cuando el equipo responda; y editar la información de tu perfil.',
            
            'creating_ticket' => '¿Cómo creo un ticket?',
            'creating_ticket_description' => 'Ir a la sección Tickets, hacer clic en "Crear Ticket", completar el título (resumen breve), descripción (explicación detallada del problema), seleccionar el tipo de ticket que aplique, indicar la prioridad según urgencia, y enviar. El sistema automáticamente notificará al equipo y recibirás actualizaciones por email.',
            
            'ticket_states' => '¿Cuáles son los estados de un ticket?',
            'ticket_states_description' => 'Un ticket puede estar en varios estados: Abierto (recién creado, esperando revisión), En Revisión (el equipo lo está analizando), En Progreso (trabajando activamente en la solución), Resuelto (se implementó la solución, esperando tu confirmación), Pausado (esperando información tuya o de terceros), o Cerrado (problema completamente resuelto y confirmado).',
            
            'priorities' => '¿Qué significan las prioridades?',
            'priorities_description' => 'Las prioridades ayudan al equipo a organizar el trabajo: Crítica (el sistema está caído o hay pérdida de datos), Alta (funcionalidad importante afectada), Normal (afecta alguna funcionalidad pero hay alternativas), y Baja (mejoras estéticas o solicitudes futuras).',
            
            'notifications' => '¿Cuándo recibo notificaciones?',
            'notifications_description' => 'Recibirás notificaciones cuando: tu ticket sea creado (confirmación), un administrador lo asigne (alguien lo tomó), se cambie el estado, se agregue un comentario, se resuelva el ticket (solicitud de confirmación), se cierre (cuando confirmes), o se reabre (si fue cerrado por error). Puedes ver notificaciones en el panel.',
            
            'editing_ticket' => '¿Puedo editar mi ticket después de crearlo?',
            'editing_ticket_description' => 'Puedes editar el título y descripción mientras el ticket esté en estado Abierto o En Revisión. Una vez que el equipo comience a trabajar (En Progreso), no puedes editar el contenido principal. Sin embargo, siempre puedes agregar comentarios para proporcionar información adicional en cualquier momento.',
            
            'best_practices' => '¿Cuáles son las mejores prácticas al crear tickets?',
            'best_practices_description' => 'Sé específico y detallado en la descripción: cuanto más claro seas, más rápido podrá resolverse. Incluye pasos exactos para reproducir el problema. Indica cuál es el resultado esperado vs. lo que realmente ocurre. Proporciona información de contexto: navegador, dispositivo, fecha/hora cuando ocurrió. Si es posible, adjunta capturas de pantalla. Evita escribir en mayúsculas (se lee como gritos). Sé profesional y respetuoso. Esto ayuda al equipo a resolver tu problema mucho más rápido.',
            
            'response_time' => '¿Cuánto tiempo tarda en responder el equipo?',
            'response_time_description' => 'Los tiempos varían según prioridad: Crítica (respuesta en horas, resolución urgente), Alta (respuesta en menos de 24h), Normal (respuesta en 1-3 días), Baja (respuesta en 5+ días). Sin embargo, siempre recibirás confirmación de que tu ticket fue recibido. Ten paciencia y evita crear tickets duplicados sobre lo mismo.',
            
            'cannot_do' => '¿Qué NO puedo hacer?',
            'cannot_do_description' => 'Como usuario regular, no puedes: crear otros usuarios, acceder al panel administrativo, ver tickets de otros usuarios, eliminar tickets (aunque pueden cerrarse), cambiar la prioridad de otros usuarios, o editar tickets cerrados. Estas restricciones protegen la integridad del sistema y la privacidad de otros usuarios.',
        ],
        'admin' => [
            'users' => 'Usuarios',
            'event_history' => 'Historial de eventos',
            
            'what_is_admin' => '¿Cuál es mi rol como administrador?',
            'what_is_admin_description' => 'Como administrador, eres responsable de gestionar todo el sistema: revisar y procesar tickets de usuarios, investigar problemas, implementar soluciones, comunicarte con usuarios, crear y gestionar otras cuentas de usuario, monitorear la actividad del sistema, mantener logs de auditoría, y garantizar que todo funcione correctamente. Es un rol de gran responsabilidad pero también de gran poder.',
            
            'tickets_management' => '¿Cómo gestiono tickets efectivamente?',
            'tickets_management_description' => 'Revisa nuevos tickets diariamente sin falta. Evalúa si tienes suficiente información - si no, cambia a "En Revisión" e inmediatamente comenta pidiendo detalles. Asigna prioridad correctamente. Cambia de estado regularmente comunicando al usuario. Documenta tus acciones en comentarios para que el usuario y otros admins entiendan qué sucede. Cuando resuelvas, sé específico sobre qué hiciste. Pide confirmación antes de cerrar. Nunca abandones un ticket sin explicación.',
            
            'admin_roles' => '¿Cuáles son los tipos de administrador?',
            'admin_roles_description' => 'Existen dos niveles: Administrador Normal (gestiona tickets, interactúa con usuarios, pero no puede cambiar configuración global ni crear otros administradores) y Superadministrador (acceso completo a todo el sistema, puede crear usuarios y admins, cambiar configuración, ver toda la auditoría). Elige el rol correcto para cada persona según responsabilidad.',
            
            'security' => '¿Cómo aseguro la integridad del sistema?',
            'security_description' => 'Usa contraseñas fuertes. Nunca compartas credenciales. Revisa regularmente el historial de eventos para actividad sospechosa. Mantén los permisos correctos - no des más acceso del necesario. Documenta cambios importantes. Usa el sistema de auditoría para rastrear quién hizo qué. Si sospechas compromiso de seguridad, notifica inmediatamente al superadministrador. Sigue las políticas de privacidad y cumplimiento de tu organización.',
            
            'when_to_escalate' => '¿Cuándo debo escalar un problema?',
            'when_to_escalate_description' => 'Escala cuando: el usuario sigue sin satisfecho después de varias intentos, el problema es técnico y requiere conocimiento específico, es una característica solicitada que requiere aprobación, afecta múltiples usuarios o es crítico, o involucra seguridad. Escala a un Superadministrador o al equipo técnico apropiado con contexto completo.',
            
            'cannot_do_as_admin' => '¿Qué NO puedo hacer como administrador?',
            'cannot_do_as_admin_description' => 'Como Administrador Normal: no puedes eliminar usuarios (si puedes suspenderlos), no puedes cambiar configuración global del sistema, no puedes crear otros administradores, no puedes ver todo el historial (solo lo relacionado con tus acciones y tus tickets), y no puedes cambiar tipos de tickets. Como Superadministrador, tienes todo el poder, pero úsalo responsablemente - el sistema rastrea tus acciones.',
        ],
    ],
];
