<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventHistory;
use Illuminate\Container\Attributes\Auth;

class EventHistoryController
{
    public function indexEventHistory(Request $request)
    {
        $eventHistory = EventHistory::query();
        
        $events = $eventHistory->paginate(10);

        return view('backoffice.admin.management.eventHistory.index', compact('events'));
    }


    public function storeHistory(Request $request)
    {
        EventHistory::create([
            'event_type' => $request->event_type,
            'description' => $request->description,
            'user_id' => Auth::user()->name,
        ]);
    }
}

