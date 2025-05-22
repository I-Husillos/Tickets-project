<?php

namespace App\Providers;

use App\Models\Ticket;
use App\Models\Comment;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Policies\TicketPolicy;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        Ticket::class => TicketPolicy::class,
        \App\Models\Comment::class => \App\Policies\CommentPolicy::class,
    ];
    
    /**
     * Register services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
