<?php

namespace App\Services\TicketsService;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketQueryService
{
    public function total(): int
    {
        return Ticket::count();
    }

    public function buildQuery(Request $request)
    {
        $query = Ticket::with(['type', 'admin', 'comments']);

        $search = $request->input('search.value');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%$search%")
                  ->orWhere('status', 'LIKE', "%$search%")
                  ->orWhere('priority', 'LIKE', "%$search%");
            });
        }

        return $query;
    }
}

