<?php

namespace App\Http\Controllers;

use App\Jobs\SendNotifications;
use App\Models\Ticket;
use App\Models\EventHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Services\TicketService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\SearchTicketRequest;
use App\Http\Requests\UpdateDataTicketRequest;

class TicketController extends Controller
{
    protected $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    public function search(SearchTicketRequest $request)
    {
        $query = $request->input('query');

        $tickets = Ticket::where('title', 'like', '%' . $query . '%')->paginate(10);

        return view('user.tickets.index', compact('tickets'));
    }


    public function showAll()
    {
        $this->authorize('index', Ticket::class);

        $user = Auth::guard('user')->user();

        $tickets = $user->tickets()->orderBy('created_at', 'desc')->paginate(10);

        return view('user.tickets.index', compact('tickets'));
    }


    public function showCreateForm()
    {
        return view('user.tickets.create');
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



        return redirect()->route('user.tickets.index', ['locale' => app()->getLocale()])->with('success', 'Ticket creado con éxito.');
    }

    public function destroy(string $locale, Ticket $ticket)
    {
        // Verifica si el usuario tiene permiso para eliminarlo (opcional)
        if ($ticket->user_id !== auth()->id()) {
            abort(403, 'No autorizado.');
        }

        $ticket->delete();

        return redirect()->route('user.tickets.index', ['locale' => $locale])
                        ->with('success', __('frontoffice.tickets.deleted_successfully'));
    }



    public function show(String $locale,Ticket $ticket)
    {
        Log::info('Ticket recibido:', ['ticket' => $ticket]);

        $this->authorize('view', $ticket);

        $ticket->load('comments');

        return view('user.tickets.show', compact('ticket'));
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
            $user,
            'Ticket con id ' . $ticket->id . ' y título "' . $ticket->title . '" actualizado a "' . $status . '"',
        );

        return redirect()->route('user.tickets.index', ['locale' => app()->getLocale()])->with('success', 'Estado del ticket actualizado.');
    }


    public function edit($locale, Ticket $ticket)
    {
        app()->setLocale($locale);
        return view('user.tickets.edit', compact('ticket'));
    }


    public function update(UpdateDataTicketRequest $request, String $locale, Ticket $ticket)
    {
        $ticket->update($request->validated());

        return redirect()->route('user.tickets.index', ['locale' => app()->getLocale()])->with('success', __('frontoffice.tickets.updated_success'));
    }


    
    public function closeTicket(String $locale,Ticket $ticket)
    {
        $this->authorize('update', $ticket);

        $admin = Auth::guard('admin')->user();


        if($ticket->status !== 'closed')
        {
            $this->ticketService->updateStatus(
                $ticket,
                'closed',
                $admin,
                'Ticket con id ' . $ticket->id . ' con el título ' . $ticket->title . ' cerrado',
            );
        }

        return redirect()->route('admin.manage.tickets', ['locale' => $locale])->with('success', 'Ticket cerrado.');
    }



    public function reopenTicket(String $locale,Ticket $ticket)
    {
        $this->authorize('update', $ticket);

        $admin = Auth::guard('admin')->user();

        $this->ticketService->updateStatus(
            $ticket,
            'pending',
            $admin,
            'Ticket con id ' . $ticket->id . ' con el título ' . $ticket->title . ' abierto',
        );

        return redirect()->route('admin.manage.tickets', ['locale' => $locale])->with('success', 'Ticket reabierto.');
    }


}





