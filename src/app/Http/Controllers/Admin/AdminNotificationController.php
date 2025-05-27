<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\DatabaseNotification;
use App\Services\NotificationService;
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

    public function showAdminNotification(String $locale, $notification)
    {
        $admin = Auth::guard('admin')->user();

        dd($admin);

        $notificationId = $admin->notifications()->find($notification);


        if (!$notificationId) {
            return response()->json(['error' => 'Notification not found'], 404);
        }

        return response()->json(NotificationService::format($notificationId, $locale, 'admin'));
    }

    public function getAdminNotificationsAjax(Request $request)
    {
        $admin = auth('admin')->user();

        $query = $admin->notifications();

        if ($request->filled('type')) {
            $query->where('type', 'like', '%' . $request->type . '%');
        }

        $notifications = $query->latest()->get();

        $data = $notifications->map(function ($notification) {
            return [
                'message' => $notification->data['message'] ?? '',
                'status' => $notification->data['status'] ?? '-',
                'author' => $notification->data['author'] ?? '-',
                'created_at' => $notification->created_at->format('d/m/Y H:i'),
                'actions' => view('admin.partials.notification-actions', compact('notification'))->render()
            ];
        });

        return response()->json(['data' => $data]);
    }


}


