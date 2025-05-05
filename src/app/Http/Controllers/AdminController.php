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


}
