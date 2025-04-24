<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventHistory;
use Illuminate\Container\Attributes\Auth;

class EventHistoryController
{
    public function indexEventHistory($request)
    {
        $eventHistory = EventHistory::query();

        if($request->filled('user'))
        {
            $eventHistory->where('user_id', $request->user);
        }

        if($request->filled('event_type'))
        {
            $eventHistory->where('event_type', $request->event_type);
        }

        if($request->filled('date'))
        {
            $eventHistory->whereDate('created_at', $request->date);
        }

        $eventHistory = $eventHistory->paginate(10);

        return view('eventHistory.index', compact('eventHistory'));
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

