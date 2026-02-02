<?php

namespace App\Services;

class NotificationService
{
    public static function format($notification, string $locale, string $guard = 'user'): array
    {
        $data = $notification->data;

        $routeName = $guard === 'admin' ? 'admin.view.ticket' : 'user.tickets.show';

        return [
            'type'       => $data['type'] ?? null,
            'ticket_id'  => $data['ticket_id'] ?? null,
            'title'      => $data['title'] ?? null,
            'message'    => $data['message'] ?? null,
            'comment'    => $data['comment'] ?? null,   
            'author'     => $data['author'] ?? null,
            'created_by' => $data['created_by'] ?? null,
            'priority'   => $data['priority'] ?? null,
            'status'     => $data['status'] ?? null,
            'updated_by' => is_array($data['updated_by'] ?? null)
                                ? $data['updated_by']['name'] ?? null
                                : $data['updated_by'] ?? null,
            'created_at' => $notification->created_at->format('d/m/Y H:i'),
            'link'       => route($routeName, ['locale' => $locale, 'ticket' => $data['ticket_id']]),
        ];
    }
}
