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

use App\Notifications\TicketCreatedNotification;
use Illuminate\Console\Scheduling\Event;

class TicketController
{
    protected $ticket;

    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }


    public function showAll()
    {
        $tickets = Ticket::where('user_id', Auth::id())->latest()->paginate(5);
        return view('backoffice.user.tickets.index', compact('tickets'));
    }


    public function create()
    {
        return view('backoffice.user.tickets.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'type' => 'required|in:bug,improvement,request',
            'priority' => 'required|in:low,medium,high,critical',
            'status' => 'required|in:new,in_progress,pending,resolved,closed'
        ]);

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
        $ticket = Ticket::with('comments.author')->find($ticket->id);

        if ($ticket->user_id !== Auth::id()) {
            abort(403);
        }

        return view('backoffice.user.tickets.show', compact('ticket'));
    }


    public function searchTicket(Request $request)
    {
        $ticket = Ticket::find($request->ticket_id);
        return view('tickets.ticket', compact('ticket'));
    }


    public function validateResolution(Request $request, Ticket $ticket)
    {
        if ($ticket->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para modificar este ticket.');
        }

        $status = $request->input('status') === 'resolved' ? 'resolved' : 'pending';
        
        $ticket->update(['status' => $status]);

        EventHistory::create([
            'event_type' => 'Actualización',
            'description' => 'Estado del ticket con id ' . $ticket->id . ' con el título ' . $ticket->title . ' actualizado',
            'user' => Auth::guard('user')->user()->name,
        ]);

        return redirect()->route('user.tickets.index')->with('success', 'Estado del ticket actualizado.');
    }


    public function closeTicket(Request $request, Ticket $ticketId)
    {
        $ticketId->update(['status' => 'closed']);

        $admin = Auth::guard('admin')->user();

        EventHistory::create([
            'event_type' => 'Actualización',
            'description' => 'Ticket con id ' . $ticketId->id . ' con el título ' . $ticketId->title . ' cerrado',
            'user' => $admin->name,
        ]);
        
        SendNotifications::dispatch($ticketId->id, 'closed', $admin->id);

        return redirect()->route('admin.manage.tickets')->with('success', 'Ticket cerrado.');
    }

    
    public function reopenTicket(Ticket $ticketId)
    {
        $ticketId->update(['status' => 'in_progress']);

        EventHistory::create([
            'event_type' => 'Actualización',
            'description' => 'Ticket con id ' . $ticketId->id . ' con el título ' . $ticketId->title . ' reabierto',
            'user' => Auth::guard('user')->user()->name,
        ]);

        return redirect()->route('admin.manage.tickets')->with('success', 'Ticket reabierto.');
    }

}

