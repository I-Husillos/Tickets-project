<?php

namespace App\Http\Controllers;

use App\Jobs\SendNotifications;
use App\Models\Admin;
use App\Models\Ticket;
use App\Models\User;
use App\Models\EventHistory;
use App\Notifications\TicketClosed;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Services\TicketService;
use Illuminate\Support\Facades\Gate;
use App\Policies\TicketPolicy;
use App\Notifications\TicketCreatedNotification;
use Illuminate\Console\Scheduling\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketRequest;

class TicketController extends Controller
{
    protected $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }


    public function showAll()
    {
        $this->authorize('viewAny', Ticket::class);

        $tickets = Ticket::paginate(10);
        return view('backoffice.user.tickets.index', compact('tickets'));
    }


    public function showCreateForm()
    {
        return view('backoffice.user.tickets.create');
    }

    public function create(StoreTicketRequest $request)
    {
        $this->authorize('create', Ticket::class);

        $validated = $request->validated();

        $validated['user_id'] = auth('user')->id();

        $ticket = Ticket::create($validated);


        EventHistory::create([
            'event_type' => 'Registro',
            'description' => 'Ticket con id ' . $ticket->id . 'con el título ' . $ticket->title . ' ha sido creado por el usuario con email ' 
            . Auth::guard('user')->user()->email . ' y nombre ' . Auth::guard('user')->user()->name,
            'user' => Auth::guard('user')->user()->name,
        ]);


        SendNotifications::dispatch($ticket->id, 'created');



        return redirect()->route('user.tickets.index')->with('success', 'Ticket creado con éxito.');
    }


    public function show(Ticket $ticket)
    {
        $this->authorize('view', $ticket);

        $ticket->load('comments');

        return view('backoffice.user.tickets.show', compact('ticket'));
    }


    public function searchTicket(Request $request)
    {
        $ticket = Ticket::find($request->ticket_id);
        return view('tickets.ticket', compact('ticket'));
    }


    public function validateResolution(Request $request, Ticket $ticket)
    {
        $this->authorize('update', $ticket);

        $status = $request->input('status') === 'resolved' ? 'resolved' : 'pending';
        $user = Auth::guard('user')->user();
    
        $this->ticketService->updateStatus(
            $ticket,
            $status,
            'Actualización',
            'Ticket con id ' . $ticket->id . ' y título "' . $ticket->title . '" actualizado a "' . $status . '"',
            $user
        );

        return redirect()->route('user.tickets.index')->with('success', 'Estado del ticket actualizado.');
    }



    
    public function closeTicket(Request $request, Ticket $ticketId)
    {
        $this->authorize('update', $ticketId);

        $admin = Auth::guard('admin')->user();

        if($ticketId->status !== 'closed')
        {
            $this->ticketService->updateStatus(
                $ticketId,
                'closed',
                'Actualización',
                'Ticket con id ' . $ticketId->id . ' con el título ' . $ticketId->title . ' cerrado',
                $admin
            );
        }
        return redirect()->route('admin.manage.tickets')->with('success', 'Ticket cerrado.');
    }



    public function reopenTicket(Ticket $ticketId)
    {
        $this->authorize('update', $ticketId);

        $admin = Auth::guard('admin')->user();

        $this->ticketService->updateStatus(
            $ticketId,
            'new',
            'Actualización',
            'Ticket con id ' . $ticketId->id . ' con el título ' . $ticketId->title . ' abierto',
            $admin,
            'reopened'
        );

        return redirect()->route('admin.manage.tickets')->with('success', 'Ticket reabierto.');
    }


}





