<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketRequest;
use App\Models\Ticket;
use App\Services\TicketService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\EventHistory;
use App\Http\Requests\UpdateDataTicketRequest;
use App\Jobs\SendNotifications;
use Illuminate\Support\Facades\Log;


class TicketApiController extends Controller
{
    protected $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    public function close(Ticket $ticket): JsonResponse
    {
        $admin = Auth::guard('api')->user();

        if ($ticket->status === 'closed') {
            return response()->json(['message' => 'El ticket ya está cerrado.'], 200);
        }

        $this->ticketService->updateStatus(
            $ticket,
            'closed',
            $admin,
            'Ticket con id ' . $ticket->id . ' con el título ' . $ticket->title . ' cerrado por ' . $admin->name,
        );

        SendNotifications::dispatch($ticket->id, 'closed', $admin);

        return response()->json(['message' => 'Ticket cerrado correctamente.']);
    }

    public function reopen(Ticket $ticket): JsonResponse
    {
        $admin = Auth::guard('api')->user();

        if ($ticket->status !== 'closed') {
            return response()->json(['message' => 'Solo se pueden reabrir tickets cerrados.'], 400);
        }

        $this->ticketService->updateStatus(
            $ticket,
            'pending',
            $admin,
            'Ticket con id ' . $ticket->id . ' con el título ' . $ticket->title . ' reabierto por ' . $admin->name,
        );

        SendNotifications::dispatch($ticket->id, 'reopened', $admin);


        return response()->json(['message' => 'Ticket reabierto correctamente.']);
    }

    public function updateTicket(UpdateDataTicketRequest $request, Ticket $ticket): JsonResponse
    {
        $admin = Auth::guard('api')->user();

        Log::info('Petición de actualización recibida', [
            'admin_id' => $admin?->id,
            'admin_name' => $admin?->name,
            'auth_check' => $admin !== null,
        ]);

        if (!$admin) {
            return response()->json([
                'success' => false,
                'message' => 'No autenticado como admin.',
            ], 401);
        }

        $validated = $request->validated();

        // Aplicar los campos comunes
        $ticket->fill($validated);

        // Aplicar manualmente el campo assigned_to → admin_id
        if (isset($validated['assigned_to'])) {
            $ticket->admin_id = $validated['assigned_to'];
        }

        $ticket->save(); // guardar todos los cambios


        EventHistory::create([
            'event_type' => 'Actualización',
            'description' => 'Ticket con id ' . $ticket->id . ' actualizado por ' . $admin->name,
            'user' => $admin->name,
        ]);

        SendNotifications::dispatch($ticket->id, 'updated');

        return response()->json([
            'success' => true,
            'message' => 'Ticket actualizado correctamente.',
        ]);
    }


    public function destroyTicket(Ticket $ticket): JsonResponse
    {
        $user = Auth::guard('api_user')->user(); // Cambia a 'api' si estás usando ese guard

        // Verifica que el ticket pertenezca al usuario autenticado
        if ($ticket->user_id !== $user->id) {
            return response()->json(['message' => 'No tienes permiso para eliminar este ticket.'], 403);
        }

        // Elimina el ticket
        $ticket->delete();

        // Registra el evento de eliminación en el historial
        EventHistory::create([
            'event_type' => 'Eliminación',
            'description' => 'El ticket con id ' . $ticket->id . ' y título "' . $ticket->title . '" ha sido eliminado por ' . $user->name,
            'user' => $user->name,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Ticket eliminado correctamente.',
        ]);
    }

    public function storeTicket(StoreTicketRequest $request): JsonResponse
    {
        $user = Auth::guard('api_user')->user();

        $data = $request->validated();
        $data['user_id'] = $user->id;

        $ticket = Ticket::create($data);

        EventHistory::create([
            'event_type' => 'Creación',
            'description' => 'Nuevo ticket creado con id ' . $ticket->id . ' por ' . $user->name,
            'user' => $user->name,
        ]);

        SendNotifications::dispatch($ticket->id, 'created');

        return response()->json([
            'success' => true,
            'message' => 'Ticket creado correctamente.',
            'ticket' => $ticket,
        ], 201);
    }
    

    public function destroy(Ticket $ticket): JsonResponse
    {
        $admin = Auth::guard('api')->user();


        Log::info('Intentando eliminar ticket:', ['id' => $ticket->id]);

        // Elimina el ticket
        $ticket->delete();

        // Registra el evento de eliminación en el historial
        EventHistory::create([
            'event_type' => 'Eliminación',
            'description' => 'El ticket con id ' . $ticket->id . ' y título "' . $ticket->title . '" ha sido eliminado por ' . $admin->name,
            'user' => $admin->name,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Ticket eliminado correctamente.',
        ]);
    }


}
