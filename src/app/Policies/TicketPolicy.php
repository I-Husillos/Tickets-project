<?php

namespace App\Policies;

use App\Models\Ticket;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Auth\Access\Response;

class TicketPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Ticket $ticket)
    {
        return $user->id === $ticket->user_id || $user->id === $ticket->admin_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $admin, Ticket $ticket)
    {
        return $admin->superadmin || $ticket->admin_id === $admin->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Ticket $ticket)
    {
        return $user->id === $ticket->admin_id;
    }

    public function comment($user, Ticket $ticket)
    {
        if ($user instanceof Admin) {
            return true;
        }

        if ($user instanceof User) {
            return $user->id === $ticket->user_id || $user->id === $ticket->admin_id;
        }

        return false;
    }


    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Ticket $ticket): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Ticket $ticket): bool
    {
        return false;
    }
}
