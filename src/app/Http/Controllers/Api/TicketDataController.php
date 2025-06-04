<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Ticket;
use App\Services\TicketsService\TicketQueryService;
use App\Services\TicketsService\TicketDataActions;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class TicketDataController extends Controller
{
    protected $queryService;
    protected $dataActions;

    public function __construct(TicketQueryService $queryService, TicketDataActions $dataActions)
    {
        $this->queryService = $queryService;
        $this->dataActions = $dataActions;
    }

    public function indexTickets(Request $request)
    {
        $admin = auth('api')->user();

        if (!$admin) {
            Log::warning('Token inválido o expirado.');
            return response()->json(['error' => 'Token inválido'], 401);
        }

        $locale = $request->header('X-Locale') ?? $request->input('locale') ?? 'en';
        App::setLocale($locale);

        $query = $this->queryService->buildQuery($request);
        $total = $this->queryService->total();
        $filtered = $query->count();

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $tickets = $query->skip($start)->take($length)->get();

        $data = $tickets->map(function ($ticket) use ($locale) {
            return $this->dataActions->transform($ticket, $locale);
        });

        return response()->json([
            'draw' => (int) $request->input('draw'),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $data,
        ]);
    }
}


