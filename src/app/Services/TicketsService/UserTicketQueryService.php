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

        
        if ($request->has('search.value')) {
            $search = $request->input('search.value');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%$search%")
                  ->orWhere('status', 'LIKE', "%$search%")
                  ->orWhere('priority', 'LIKE', "%$search%");
            });
        }
        

        return $query;
    }
}

