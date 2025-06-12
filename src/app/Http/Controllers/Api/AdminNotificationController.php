<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\NotificationService;
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
                'content' => $notification->data['message'],
                'type' => $notification->data['type'],
                'date' => $notification->created_at->diffForHumans(),
                'actions' => view('components.actions.notification-actions', [
                    'notification' => $notification,
                    'locale' => $locale,
                    'guard' => 'admin',
                ])->render(),
            ];
        });

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $data,
        ]);

    }


    public function showNotification(Request $request, $notificationId)
    {
        $admin = auth('api')->user();

        if (!$admin) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $notification = $admin->notifications()->find($notificationId);

        if (!$notification) {
            return response()->json(['error' => 'Notification not found'], 404);
        }

        return response()->json([
            'data' => NotificationService::format($notification, 'admin')
        ]);
    }


    public function markAsRead($notificationId)
    {
        $admin = auth('api')->user();
        $notification = $admin->notifications()->find($notificationId);

        if ($notification) {
            $notification->markAsRead();
            return response()->json(['message' => 'Notification marked as read']);
        }

        return response()->json(['error' => 'Notification not found'], 404);
    }


    public function markAsUnread($notificationId)
    {
        $admin = auth('api')->user();
        $notification = $admin->notifications()->find($notificationId);

        if ($notification) {
            $notification->update(['read_at' => null]);
            return response()->json(['message' => 'Notification marked as unread']);
        }

        return response()->json(['error' => 'Notification not found'], 404);
    }

}
