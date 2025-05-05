<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EventHistory;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function showListUsers()
    {
        $users = User::paginate(10, ['*'], 'users_pagination');

        return view('backoffice.admin.management.listusers' , compact('users'));
    }

    public function createUser()
    {
        return view('backoffice.admin.management.createFormUser');
    }


    public function storeUser(StoreUserRequest $request)
    {
        $data = $request->validated();

        $user = new User();

        $user->name = $data['name'];
        $user->email = $data['email'];
        
        $user->password = Hash::make($request->password);
        $user->save();

        EventHistory::create([
            'event_type' => 'Registro',
            'description' => 'El usuario con email ' . $user->email . ' y nombre ' . $user->name . ' ha sido registrado',
            'user' => Auth::guard('admin')->user()->name,
        ]);

        return redirect()->route('admin.manage.dashboard')->with('success', 'Usuario creado correctamente.');
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


    public function editUser(User $user)
    {
        return view('backoffice.admin.management.editFormUser', compact('user'));
    }

    public function updateUser(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        $user->name = $data['name'];
        $user->email = $data['email'];

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
}

