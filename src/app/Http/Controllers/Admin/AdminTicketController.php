<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Admin;
use App\Models\Type;
use App\Jobs\SendNotifications;
use App\Models\EventHistory;
use App\Http\Requests\UpdateTicketStatusRequest;

use Illuminate\Support\Facades\Auth;

class AdminTicketController extends Controller
{
    public function viewTicket(String $locale, Ticket $ticket)
    {
        $admins = Admin::all();
        $ticketTypes = Type::all();

        return view('backoffice.admin.tickets.viewtickets', compact('ticket', 'admins', 'ticketTypes'));
    }
    

    public function manageTickets(Request $request)
    {
        $query = Ticket::query();

        if($request->filled('status'))
        {
            $query->where('status',$request->status);
        }

        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        $tickets = $query->paginate(5);

        return view('backoffice.admin.tickets.managetickets', compact('tickets'));
    }



    public function filterTickets(Request $request)
    {
        $query = Ticket::query();

        if($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if($request->filled('priority')){
            $query->where('priority', $request->priority);
        }

        if($request->filled('type')){
            $query->where('type', $request->type);
        }

        $tickets = $query->get();
        return view('backoffice.admin.managetickets', compact('tickets'));
    }



    public function updateTicketStatus(String $locale, UpdateTicketStatusRequest $request, Ticket $ticket)
    {
        $this->authorize('update', $ticket);
        
        $validated = $request->validated();

        // Asignación del admin
        if (isset($validated['assigned_to'])) {
            $ticket->admin_id = $validated['assigned_to'];
        }

        // Verifica y crea tipo si no existe
        if (!empty($validated['type'])) {
            $typeName = $validated['type'];

            $existingType = \App\Models\Type::where('name', $typeName)->first();

            if (!$existingType) {
                \App\Models\Type::create(['name' => $typeName]);
            }

            $ticket->type = $typeName;
        }

        // Otras actualizaciones
        $ticket->status = $validated['status'];
        $ticket->priority = $validated['priority'] ?? $ticket->priority;

        $ticket->save();

        $admin = Auth::guard('admin')->user();

        SendNotifications::dispatch($ticket->id, 'status_changed', $admin);

        EventHistory::create([
            'event_type' => 'Actualización',
            'description' => 'El ticket con id ' . $ticket->id . ' con el título ' . $ticket->title . ' ha sido actualizado',
            'user' => $admin->name,
        ]);

        if($admin->superadmin) {
            return redirect()->route('admin.manage.tickets', ['locale' => $locale])->with('success', 'Ticket actualizado correctamente.');
        }else{
            return redirect()->route('admin.show.assigned.tickets', ['locale' => $locale])->with('success', 'Ticket actualizado correctamente.');
        }
    }

    public function showAssignedTickets(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $query = Ticket::where('admin_id', $admin->id);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        $assignedTickets = $query->paginate(5);

        return view('backoffice.admin.tickets.assignedticketsview', compact('assignedTickets'));
    }
}
