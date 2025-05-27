<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notification;
use App\Services\NotificationService;

class UserNotificationController extends Controller
{
    public function showNotificationsView(Request $request)
    {
        $user= Auth::guard('user')->user();

        $query = DatabaseNotification::where('notifiable_id', $user->id)->where('notifiable_type', get_class($user));
        
        if($request->filled('type'))
        {
            $query->where('data->type', $request->type);
        }
        
        $notifications = $query->orderBy('created_at', 'desc')->paginate(10);


        return view('user.notifications.viewnotifications', compact('notifications'));
    }

    public function markAsRead($locale, $notificationId)
    {
        $user = Auth::guard('user')->user();
        
        $notification = $user->notifications->find($notificationId);

        if ($notification) {
            $notification->markAsRead();
        }

        return redirect()->route('user.notifications', ['locale' => $locale]);
    }

    public function showUserNotification(String $locale, $notification)
    {
        $user = Auth::guard('user')->user();

        dd($user);
        
        $notificationId = $user->notifications()->find($notification);

        if (!$notificationId) {
            return response()->json(['error' => 'Notification not found'], 404);
        }

        return response()->json(NotificationService::format($notificationId, $locale, 'user'));
    }
}



