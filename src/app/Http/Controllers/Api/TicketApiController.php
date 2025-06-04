<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Ticket;
use App\Models\User;
use App\Services\TicketService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class TicketApiController extends Controller
{
    protected $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    public function close(Ticket $ticket): JsonResponse
    {
        $admin = Auth::guard('admin-api')->user();

        if ($ticket->status === 'closed') {
            return response()->json(['message' => 'El ticket ya está cerrado.'], 200);
        }

        $this->ticketService->updateStatus(
            $ticket,
            'closed',
            $admin,
            'Ticket con id ' . $ticket->id . ' con el título ' . $ticket->title . ' cerrado por ' . $admin->name,
        );

        return response()->json(['message' => 'Ticket cerrado correctamente.']);
    }

    public function reopen(Ticket $ticket): JsonResponse
    {
        $admin = Auth::guard('admin-api')->user();

        if ($ticket->status !== 'closed') {
            return response()->json(['message' => 'Solo se pueden reabrir tickets cerrados.'], 400);
        }

        $this->ticketService->updateStatus(
            $ticket,
            'pending',
            $admin,
            'Ticket con id ' . $ticket->id . ' con el título ' . $ticket->title . ' reabierto por ' . $admin->name,
        );

        return response()->json(['message' => 'Ticket reabierto correctamente.']);
    }
}
