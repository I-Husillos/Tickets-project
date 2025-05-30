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
import { Alert } from 'bootstrap';


//const bearerToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// Token de autenticación
const storedToken = localStorage.getItem('api_token');
const metaToken = document.querySelector('meta[name="api-token"]')?.getAttribute('content');
const token = storedToken || metaToken;

if (token) {
    localStorage.setItem('api_token', token); // Guarda en localStorage por si viene del meta
    $.ajaxSetup({
        headers: {
            'Authorization': 'Bearer ' + token
        }
    });
} else {
    console.warn('No se encontró token ni en localStorage ni en meta');
}




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
// document.addEventListener('DOMContentLoaded', () => {
//     tablasDataTables.forEach(({ id, fn }) => {
//         const tabla = document.getElementById(id);
//         if (tabla) {
//             const url = tabla.dataset.url;
//             const locale = tabla.dataset.locale || 'es';
        
//             if (!url) {
//                 console.warn(`La tabla con ID "${id}" no tiene data-url.`);
//                 return;
//             }
        
//             // Aquí se pasa el token Bearer a cada tabla
//             fn(locale, url, bearerToken);
//         }        
//     });
// });



document.addEventListener('DOMContentLoaded', () => {
    tablasDataTables.forEach(({ id, fn }) => {
        const tabla = document.getElementById(id);
        if (!tabla) return;

        const apiUrl = tabla.dataset.apiUrl;
        const locale = tabla.dataset.locale || 'es';

        if (!apiUrl || !token) {
            console.warn(`Faltan datos para inicializar ${id}`);
            return;
        }

        console.log(token);

        fn(locale, apiUrl, token);
    });
});


