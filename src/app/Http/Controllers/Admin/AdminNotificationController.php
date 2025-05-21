<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\DatabaseNotification;
use PhpParser\Node\Expr\Cast\String_;

class AdminNotificationController extends Controller
{
    public function showNotifications(String $locale, Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $query = DatabaseNotification::where('notifiable_id', $admin->id)->where('notifiable_type', get_class($admin));

        if($request->filled('type'))
        {
            $type = $request->type;

            if ($type === 'ticket') {
                $query->where('data->message', 'Se ha creado un nuevo ticket.');
            } elseif ($type === 'comment') {
                $query->where('data->type', 'comment');
            }
        }

        $notifications = auth()->user()->notifications()
            ->when(request('type'), fn($q) => $q->where('type', 'like', '%' . request('type') . '%'))
            ->latest()
            ->paginate(10);



        return view('admin.notifications.notifications', compact('notifications'));
    }


    public function markAsRead($locale, $notificationId)
    {
        $admin = Auth::guard('admin')->user();

        $notification = $admin->notifications->find($notificationId);

        if ($notification) {
            $notification->markAsRead();
        }

        return redirect()->route('admin.notifications', ['locale' => $locale]);
    }

    public function markAllAsRead()
    {
        $admin = Auth::guard('admin')->user();

        $admin->unreadNotifications->markAsRead();

        return redirect()->route('admin.notifications', ['locale' => app()->getLocale()])->with('success', __('general.admin_notifications.all_marked'));
    }

    public function show(String $locale, DatabaseNotification $notification)
    {
        // Buscar la notificación por ID
        $notification = Notification::findOrFail($notification);

        // Retornar solo el contenido HTML de la notificación para ser mostrado en el drawer
        return view('components.notification-details', compact('notification'));
    }
}
