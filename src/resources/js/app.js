// --- Bootstrap básico y AdminLTE ---
import './bootstrap';
import 'bootstrap';
import 'admin-lte/dist/css/adminlte.min.css';
import 'admin-lte/dist/js/adminlte.min.js';
import './vendors.js';
import 'popper.js/dist/umd/popper.min.js';

// --- jQuery global ---
import $ from 'jquery';
window.$ = $;
window.jQuery = $;

// --- DataTables core + responsive ---
import DataTable from 'datatables.net-bs4';
import Responsive from 'datatables.net-responsive-bs4';
import 'datatables.net-bs4/css/dataTables.bootstrap4.min.css';
import 'datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css';

// --- Scripts propios ---
import './navbar';
import './sidebar-toggle.js';
// import './forms/admin-login.js';
import './notifications/notifications.js';
import './notifications/admin-notifications.js';
import './comments/deleteCommentTicket.js';
import './forms/admin-users-form.js';
import './forms/admin-admins-form.js';
import './forms/admin-types-form.js';
import './forms/admin-tickets-form.js';
import './admin/users/admin-users-actions';
import './admin/admins/admin-admins-actions.js';
import './admin/types/admin-types-actions.js';
// import './admin/tickets/admin-tickets-actions';
// import './forms/admin-events-form.js';
// import './admin/events/admin-events-actions';
// import './forms/admin-comments-form.js';
// import './admin/comments/admin-comments-actions';

// --- Importación de tablas específicas ---
import { initAdminUsersTable } from './tables/admin-users-table';
import { initAdminAdminsTable } from './tables/admin-admins-table';
import { initAdminTypesTable } from './tables/admin-types-table';
import { initAdminTicketsTable } from './tables/admin-tickets-table';
import { initAssignedTicketsTable } from './tables/admin-assigned-tickets-table';
import { initAdminEventsTable } from './tables/admin-events-table';
import { initAdminCommentsTable } from './tables/admin-comments';
import { initUserTicketsTable } from './tables/user-tickets-table';

import { initTicketActionButtons } from './tickets/events.js';

// --- Bootstrap Alert (necesario si usas JS para cerrarlas manualmente) ---
import { Alert } from 'bootstrap';


// --- TOKEN de autenticación ---
const token = localStorage.getItem('api_token');

if (token) {
    localStorage.setItem('api_token', token); // Persistencia
    $.ajaxSetup({
        headers: {
            'Authorization': 'Bearer ' + token
        }
    });

    document.addEventListener('DOMContentLoaded', () => {
        initTicketActionButtons(token);
    });

} else {
    console.warn('No se encontró token ni en localStorage ni en la meta-tag');
}


// --- Mapa de tablas y funciones correspondientes ---
const tablasDataTables = [
    { id: 'tabla-usuarios', fn: initAdminUsersTable },
    { id: 'tabla-admins', fn: initAdminAdminsTable },
    { id: 'tabla-types', fn: initAdminTypesTable },
    { id: 'tabla-tickets', fn: initAdminTicketsTable },
    { id: 'tabla-tickets-asignados', fn: initAssignedTicketsTable },
    { id: 'tabla-comentarios', fn: initAdminCommentsTable },
    { id: 'tabla-eventos', fn: initAdminEventsTable },
    { id: 'tabla-comentarios', fn: initAdminCommentsTable },
    { id: 'tabla-users-tickets', fn: initUserTicketsTable },
];


// --- Inicialización automática de DataTables cuando el DOM esté listo ---
document.addEventListener('DOMContentLoaded', () => {
    tablasDataTables.forEach(({ id, fn }) => {
        const tabla = document.getElementById(id);
        if (!tabla) return;

        const apiUrl = tabla.dataset.apiUrl;

        if (!apiUrl || !token) {
            console.warn(`Faltan datos para inicializar la tabla con ID "${id}"`);
            return;
        }

        console.log(`Token para ${id}:`, token);
        fn(apiUrl, token);
    });
});



