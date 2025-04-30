<?php

namespace App\Http\Controllers;

use App\Jobs\SendNotifications;
use App\Models\Admin;
use App\Models\User;
use App\Models\Type;
use App\Models\EventHistory;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Notifications\TicketStatusChanged;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Container\Attributes\Auth as AttributesAuth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\DatabaseNotification;

class AdminController extends Controller
{
    Use Notifiable;      

    public function showLoginForm()
    {
        return view('frontoffice.auth.adminform');
    }


    public function login(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ]);

        $credentials = $request->only('email','password');;

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.manage.dashboard')->with('success', 'Inicio de sesión exitoso.');
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

        SendNotifications::dispatch($ticket->id, 'status_changed', $admin);

        EventHistory::create([
            'event_type' => 'Actualización',
            'description' => 'El ticket con id ' . $ticket->id . ' con el título ' . $ticket->title . ' ha sido actualizado',
            'user' => $admin->name,
        ]);

        if($admin->superadmin) {
            return redirect()->route('admin.manage.tickets')->with('success', 'Ticket actualizado correctamente.');
        }else{
            return redirect()->route('admin.show.assigned.tickets')->with('success', 'Ticket actualizado correctamente.');
        }
    }

    


    public function showNotifications(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $query = DatabaseNotification::where('notifiable_id', $admin->id)->where('notifiable_type', get_class($admin));

        if($request->filled('type'))
        {
            $type = $request->type;

            if ($type === 'ticket') {
                $query->where('data->message', 'Se ha creado un nuevo ticket.');
            } elseif ($type === 'comment') {
                $query->where('data->type', 'comment');
            }
        }
        
        $notifications = $query->get();


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

    public function showManageDashboard()
    {
        
        $totalUsers = \App\Models\User::count();
        $totalAdmins = \App\Models\Admin::count();
        $totalTickets = \App\Models\Ticket::count();
        $pendingTickets = \App\Models\Ticket::where('status', 'pendiente')->count();
        $resolvedTickets = \App\Models\Ticket::where('status', 'resuelto')->count();

        $recentEvents = \App\Models\EventHistory::latest()->take(5)->get();

        $recentNotifications = Auth::guard('admin')->user()->unreadNotifications->take(5);

        $admin = Auth::guard('admin')->user();
        $isSuperAdmin = $admin->superadmin;

        $assignedTickets = Ticket::where('admin_id', $admin->id);

        return view('backoffice.admin.management.managedashboard', compact(
            'totalUsers', 'totalAdmins', 'totalTickets', 'pendingTickets', 'resolvedTickets', 'recentEvents', 'recentNotifications', 'isSuperAdmin', 'assignedTickets'
            ,'assignedTickets'
        ));
    }

    

    public function showListUsers()
    {
        $users = User::paginate(10, ['*'], 'users_pagination');

        return view('backoffice.admin.management.listusers' , compact('users'));
    }
    
    public function showListAdmins(Request $request)
    {
        $query = Admin::query();
    
        if ($request->has('superadmin') && $request->superadmin !== '') {
            $query->where('superadmin', $request->superadmin);
        }
    
        $admins = $query->paginate(10, ['*'], 'admins_pagination')->appends($request->query());
    
        return view('backoffice.admin.management.listadmins', compact('admins'));
    }
    
    

    public function showAddDashboard()
    {
        return view('backoffice.admin.management.adddashboard');
    }



    public function createUser()
    {
        return view('backoffice.admin.management.createFormUser');
    }

    public function createAdmin()
    {
        return view('backoffice.admin.management.createFormAdmin');
    }

    public function storeUser()
    {
        $request = request();
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        EventHistory::create([
            'event_type' => 'Registro',
            'description' => 'El usuario con email ' . $user->email . ' y nombre ' . $user->name . ' ha sido registrado',
            'user' => Auth::guard('admin')->user()->name,
        ]);

        return redirect()->route('admin.manage.dashboard')->with('success', 'Usuario creado correctamente.');
    }


    public function storeAdmin()
    {
        $request = request();
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->superadmin = $request->superadmin ? true : false;
        $admin->save();

        EventHistory::create([
            'event_type' => 'Registro',
            'description' => 'El administrador con email ' . $admin->email . ' y nombre ' . $admin->name . ' ha sido registrado',
            'user' => Auth::guard('admin')->user()->name,
        ]);

        return redirect()->route('admin.manage.dashboard')->with('success', 'Administrador creado correctamente.');
    }




    public function confirmDeleteUser(User $user)
    {
        return view('backoffice.admin.management.confirm-delete-user', compact('user'));
    }

    public function confirmDeleteUserPost(User $user)
    {
        $user->delete();

        EventHistory::create([
            'event_type' => 'Eliminación',
            'description' => 'El usuario con email ' . $user->email . ' y nombre ' . $user->name . ' ha sido eliminado',
            'user' => Auth::guard('admin')->user()->name,
        ]);

        return redirect()->route('admin.dashboard.list.users')->with('success', 'Usuario eliminado correctamente.');
    }


    public function confirmDeleteAdmin(Admin $admin)
    {
        return view('backoffice.admin.management.confirm-delete-admin', compact('admin'));
    }

    public function confirmDeleteAdminPost(Admin $admin)
    {
        $admin->delete();

        EventHistory::create([
            'event_type' => 'Eliminación',
            'description' => 'El administrador ' . $admin->name . ' ha sido eliminado',
            'user' => Auth::guard('admin')->user()->name,
        ]);

        return redirect()->route('admin.dashboard.list.admins')->with('success', 'Administrador eliminado correctamente.');
    }


    public function editUser(User $user)
    {
        return view('backoffice.admin.management.editFormUser', compact('user'));
    }



    public function editAdmin(Admin $admin)
    {
        return view('backoffice.admin.management.editFormAdmin', compact('admin'));
    }

    

    public function updateUser(User $user)
    {
        $request = request();
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        EventHistory::create([
            'event_type' => 'Actualización',
            'description' => 'El usuario con email ' . $user->email . ' y nombre ' . $user->name . ' ha sido actualizado',
            'user' => Auth::guard('admin')->user()->name,
        ]);

        return redirect()->route('admin.dashboard.list.users')->with('success', 'Usuario actualizado correctamente.');
    }


    public function updateAdmin(Admin $admin)
    {
        $request = request();
        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }
        $admin->save();

        EventHistory::create([
            'event_type' => 'Actualización',
            'description' => 'El administrador con email ' . $admin->email . ' y nombre ' . $admin->name . ' ha sido actualizado',
            'user' => Auth::guard('admin')->user()->name,
        ]);

        return redirect()->route('admin.dashboard.list.admins')->with('success', 'Administrador actualizado correctamente.');
    }




    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
