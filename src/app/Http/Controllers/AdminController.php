<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Notifications\TicketStatusChanged;
use Illuminate\Notifications\Notifiable;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    Use Notifiable;      

    public function showLoginForm()
    {
        return view('frontoffice.auth.adminform');
    }

    public function dashboard()
    {
        $admin = Auth::guard('admin')->user();

        $isSuperAdmin = $admin->superadmin;

        $notifications = $admin->notifications;
        
        $tickets = Ticket::all();
        
        return view('backoffice.admin.dashboard', compact('tickets', 'notifications', 'isSuperAdmin'));
    }


    public function login(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ]);

        $credentials = $request->only('email','password');;

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard')->with('success', 'Inicio de sesión exitoso.');
        }

        return back()->with('error', 'Correo o contraseña incorrectos.');
    
    }



    public function viewTicket(Ticket $ticket)
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


    // public function manageUsers()
    // {
    //     $users = User::all();
    //     return view('backoffice.admin.manageusers', compact('users'));
    // }


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



    public function updateTicketStatus(Request $request, Ticket $ticket)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,in_progress,pending,resolved,closed,cancelled',
            'priority' => 'nullable|in:low,medium,high,critical',
            'type' => 'nullable|string|max:255',
            'assigned_to' => 'nullable|exists:admins,id',
        ]);

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
        $ticket->user->notify(new TicketStatusChanged($ticket, $admin));

        if($admin->superadmin) {
            return redirect()->route('admin.manage.tickets')->with('success', 'Ticket actualizado correctamente.');
        }else{
            return redirect()->route('admin.show.assigned.tickets')->with('success', 'Ticket actualizado correctamente.');
        }
    }

    


    public function showNotifications()
    {
        $admin = Auth::user();

        $notifications = $admin->notifications;


        return view('backoffice.admin.notifications.notifications', compact('notifications'));
    }


    public function markAsRead($notificationId)
    {
        $admin = Auth::guard('admin')->user();

        $notification = $admin->notifications->find($notificationId);

        if ($notification) {
            $notification->markAsRead();
        }

        return redirect()->route('admin.notifications');
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

    


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}

