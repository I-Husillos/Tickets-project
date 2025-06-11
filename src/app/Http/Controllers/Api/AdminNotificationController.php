<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminNotificationController extends Controller
{
    public function getNotifications(Request $request)
    {
        $admin = auth('api')->user();

        if(!$admin) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $locale = $request->header('X-Locale') ?? app()->getLocale();

        $query = $admin->notifications();

        if ($request->filled('type')) {
            $query->where('data->type', $request->input('type'));
        }

        $total = $query->count();

        if ($search = $request->input('search.value')) {
            $query->where('data->message', 'LIKE', "%{$search}%");
        }

        $filtered = $query->count();

        $notifications = $query->orderBy('created_at', 'desc')
            ->skip($request->input('start', 0))
            ->take($request->input('length', 10))
            ->get();

        $data = $notifications->map(function ($notification) use ($locale) {
            return [
                'id' => $notification->id,
                'message' => $notification->data['message'],
                'type' => $notification->data['type'],
                'date' => $notification->created_at->diffForHumans(),
                'actions' => view('admin.partials.notification-actions', compact('notification'))->render()
            ];
        });

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $data,
        ]);

    }

    public function markAsRead()
    {

    }

    public function markAsUnread()
    {

    }

    public function showNotification()
    {

    }


}
