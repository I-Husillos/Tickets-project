<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showProfile($locale)
    {
        app()->setLocale($locale);
        $user = Auth::guard('user')->user();

        return view('user.profile', compact('user'));
    }
}
