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


        if($request->filled('event_type'))
        {
            $eventHistory->where('event_type', 'like', '%' . $request->event_type . '%');
        }

        
        if($request->filled('user'))
        {
            $eventHistory->where('user', 'like', '%' . $request->user . '%');
        }


        if($request->filled('date'))
        {
            $eventHistory->whereDate('created_at', $request->date);
        }

        $events = $eventHistory->paginate(10);

        return view('backoffice.admin.management.eventHistory.index', compact('events'));
    }


    public function storeHistory(Request $request)
    {
        EventHistory::create([
            'event_type' => $request->event_type,
            'description' => $request->description,
            'user' => $request->user,
        ]);
    }
}

