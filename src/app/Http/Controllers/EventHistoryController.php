<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventHistory;
use Illuminate\Container\Attributes\Auth;
use App\Services\EventHistoryService;

class EventHistoryController
{
    protected $eventHistoryService;

    public function __construct(EventHistoryService $eventHistoryService)
    {
        $this->eventHistoryService = $eventHistoryService;
    }

    public function indexEventHistory(Request $request)
    {
        $filters = $request->only(['event_type', 'user', 'date']);
        $events = $this->eventHistoryService->filterEvents($filters);

        return view('backoffice.admin.management.eventHistory.index', compact('events'));
    }


    public function storeHistory(Request $request)
    {
        $validated = $request->validate([
            'event_type' => 'required',
            'user' => 'required',
            'date' => 'required',
        ]);

        $this->eventHistoryService->store($validated);

        return redirect()->route('admin.eventHistory.index');
    }
}

