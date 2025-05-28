// --- Bootstrap básico y AdminLTE ---
import './bootstrap';
import 'bootstrap';
import 'admin-lte/dist/css/adminlte.min.css';
import 'admin-lte/dist/js/adminlte.min.js';
import './vendors.js';
import 'popper.js/dist/umd/popper.min.js';

// jQuery global
import $ from 'jquery';
window.$ = $;
window.jQuery = $;

// --- DataTables core y extensiones ---
import DataTable from 'datatables.net-bs4';

import Responsive from 'datatables.net-responsive-bs4';

import 'datatables.net-bs4/css/dataTables.bootstrap4.min.css';
import 'datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css';

// --- Scripts de la app ---
import './navbar';
import './sidebar-toggle.js';
import './notifications/notifications.js';
import './notifications/admin-notifications.js';
import './commentTicket.js';
import './forms/admin-users-form.js'

import { initAdminUsersTable } from './tables/admin-users-table';
import { initAdminAdminsTable } from './tables/admin-admins-table';
import { initAdminTypesTable } from './tables/admin-types-table';
import { initAdminTicketsTable } from './tables/admin-tickets-table';
import { initAdminAssignedTicketsTable } from './tables/admin-assigned-tickets-table';
import { initAdminTicketCommentsTable } from './tables/admin-ticket-comments-table';
import { initAdminEventsTable } from './tables/admin-events-table';

// mapa de tablas y funciones
const tablasDataTables = [
    { id: 'tabla-usuarios', fn: initAdminUsersTable },
    { id: 'tabla-admins', fn: initAdminAdminsTable },
    { id: 'tabla-types', fn: initAdminTypesTable },
    { id: 'tabla-tickets', fn: initAdminTicketsTable },
    { id: 'tabla-tickets-asignados', fn: initAdminAssignedTicketsTable },
    { id: 'tabla-comentarios', fn: initAdminTicketCommentsTable },
    { id: 'tabla-eventos', fn: initAdminEventsTable },
    // Agregar mas si se hacen nuevas
];

// --- Inicialización de tablas ---
document.addEventListener('DOMContentLoaded', () => {
    tablasDataTables.forEach(({ id, fn }) => {
        const tabla = document.getElementById(id);
        if (tabla) {
            const url = tabla.dataset.url;
            const locale = tabla.dataset.locale || 'es';
        
            if (!url) {
                console.warn(`La tabla con ID "${id}" no tiene data-url.`);
                return;
            }
        
            fn(locale, url);
        }        
    });
});



