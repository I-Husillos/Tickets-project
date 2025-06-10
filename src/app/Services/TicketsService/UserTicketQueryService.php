<?php

namespace App\Services\TicketsService;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class UserTicketQueryService
{
    public function filter(Request $request, Builder $query): Builder
    {
        // Solo tickets del usuario autenticado
        $query->where('user_id', Auth::id());

        // Filtro por estado si lo hay
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        return $query;
    }
}

