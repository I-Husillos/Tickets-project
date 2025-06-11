<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;


class UserNotificationController extends Controller
{
    public function getNotifications(Request $request)
    {
        $user = auth('api_user')->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $locale = $request->header('X-Locale') ?? app()->getLocale();

        $query = $user->notifications();

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
                'type' => ucfirst($notification->data['type'] ?? 'N/A'),
                'content' => $notification->data['message'] ?? '',
                'date' => $notification->created_at->format('d/m/Y H:i'),
                'actions' => view('components.actions.notification-actions', [
                    'notification' => $notification,
                    'locale' => $locale
                ])->render(),
            ];
        });

        return response()->json([
            'draw' => (int) $request->input('draw'),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $data,
        ]);
    }


    public function showNotification(Request $request, $notificationId)
    {
        $user = auth('api_user')->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $notification = $user->notifications()->find($notificationId);

        if (!$notification) {
            return response()->json(['error' => 'Notification not found'], 404);
        }

        return response()->json([
            'data' => NotificationService::format($notificationId, $locale, 'user')
        ]);
    }

    public function markAsRead(Request $request, $notificationId)
    {
        $user = auth('api_user')->user();
        $notification = $user->notifications()->find($notificationId);

        if ($notification) {
            $notification->markAsRead();
            return response()->json(['message' => 'Notification marked as read']);
        }

        return response()->json(['error' => 'Notification not found'], 404);
    }


}

