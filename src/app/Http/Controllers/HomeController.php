<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController
{
    public function showOptions()
    {
        return view('frontoffice.auth.login');
    }

}
