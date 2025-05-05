<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;


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
        
        $notifications = $query->get();


        return view('backoffice.user.notifications.viewnotifications', compact('notifications'));
    }

    public function markAsRead($notificationId)
    {
        $user = Auth::guard('user')->user();
        
        $notification = $user->notifications->find($notificationId);

        if ($notification) {
            $notification->markAsRead();
        }

        return redirect()->route('user.notifications');
    }
}
