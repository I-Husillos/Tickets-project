<?php
namespace App\Services;

use App\Models\Ticket;
use App\Models\EventHistory;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendNotifications;

class TicketService
{
    public function createTicket(array $validated): Ticket
    {
        $validated['user_id'] = Auth::guard('user')->id();
        $ticket = Ticket::create($validated);

        EventHistory::create([
            'event_type' => 'Registro',
            'description' => 'Ticket con id ' . $ticket->id . ' y título "' . $ticket->title . '" creado por ' . Auth::guard('user')->user()->email,
            'user' => Auth::guard('user')->user()->name,
        ]);

        SendNotifications::dispatch($ticket->id, 'created');
        return $ticket;
    }

    public function updateStatus(Ticket $ticket, string $newStatus, $actor)
    {
        $ticket->update(['status' => $newStatus]);

        EventHistory::create([
            'event_type' => 'Actualización',
            'description' => 'Ticket con id ' . $ticket->id . ' y título "' . $ticket->title . '" actualizado a "' . $newStatus . '"',
            'user' => $actor->name,
        ]);
    }
}
