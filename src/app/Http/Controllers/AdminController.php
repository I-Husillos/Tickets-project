<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Type;
use App\Models\EventHistory;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Notifications\TicketStatusChanged;
use Illuminate\Container\Attributes\Auth as AttributesAuth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\DatabaseNotification;

use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;

class AdminController extends Controller
{
    Use Notifiable;      

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
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




}
