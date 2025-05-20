<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    public function showProfile($locale)
    {
        app()->setLocale($locale);
        $user = Auth::guard('admin')->user();

        return view('admin.profile', compact('user'));
    }

}
