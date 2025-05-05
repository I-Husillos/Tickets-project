<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function dashboard()
    {
        $user = Auth::guard('user') -> user();

        $tickets = $user->tickets;

        return view('frontoffice.dashboard', compact('tickets'));
    }
}
