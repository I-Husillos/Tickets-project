<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\EventHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Contracts\Cache\Store;

class AdminAdminController extends Controller
{
    public function showListAdmins(Request $request)
    {
        $query = Admin::query();
    
        if ($request->has('superadmin') && $request->superadmin !== '') {
            $query->where('superadmin', $request->superadmin);
        }
    
        $admins = $query->paginate(10, ['*'], 'admins_pagination')->appends($request->query());
    
        return view('backoffice.admin.management.listadmins', compact('admins'));
    }

    public function createAdmin()
    {
        return view('backoffice.admin.management.createFormAdmin');
    }

    public function storeAdmin(StoreAdminRequest $request)
    {
        $data = $request->validated();

        $admin = new Admin();

        $admin->name = $data['name'];
        $admin->email = $data['email'];

        $admin->password = Hash::make($request->password);
        $admin->superadmin = $request->boolean('superadmin');
        $admin->save();

        EventHistory::create([
            'event_type' => 'Registro',
            'description' => 'El administrador con email ' . $admin->email . ' y nombre ' . $admin->name . ' ha sido registrado',
            'user' => Auth::guard('admin')->user()->name,
        ]);

        return redirect()->route('admin.manage.dashboard')->with('success', 'Administrador creado correctamente.');
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

    public function editAdmin(Admin $admin)
    {
        return view('backoffice.admin.management.editFormAdmin', compact('admin'));
    }


    public function updateAdmin(UpdateUserRequest $request, Admin $admin)
    {
        $data = $request->validated();
        
        $admin->name = $data['name'];
        $admin->email = $data['email'];


        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->superadmin = $request->boolean('superadmin');

        $admin->save();

        EventHistory::create([
            'event_type' => 'Actualización',
            'description' => 'El administrador con email ' . $admin->email . ' y nombre ' . $admin->name . ' ha sido actualizado',
            'user' => Auth::guard('admin')->user()->name,
        ]);

        return redirect()->route('admin.dashboard.list.admins')->with('success', 'Administrador actualizado correctamente.');
    }
}
