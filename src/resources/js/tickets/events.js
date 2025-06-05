import $ from 'jquery';
import { closeTicket, reopenTicket } from './ticket-actions';


export function initTicketActionButtons(token) {
    document.addEventListener('click', async (e) => {
        if (e.target.closest('.btn-close-ticket')) {
            const btn = e.target.closest('.btn-close-ticket');
            const id = btn.dataset.ticketId;

            if (!confirm('¿Estás seguro de que deseas cerrar el ticket?')) return;

            const result = await closeTicket(id, token);
            alert(result.message || 'Operación completada');
            location.reload(); // Recargar la página sin refrescar la pantalla
        }

        if (e.target.closest('.btn-reopen-ticket')) {
            const btn = e.target.closest('.btn-reopen-ticket');
            const id = btn.dataset.ticketId;

            if (!confirm('¿Deseas reabrir este ticket?')) return;

            const result = await reopenTicket(id, token);
            console.log(token);
            alert(result.message || 'Operación completada');
            location.reload(); // Recargar la página sin refrescar la pantalla
        }
    });
}



