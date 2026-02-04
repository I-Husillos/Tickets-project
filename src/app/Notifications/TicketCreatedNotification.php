<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TicketCreatedNotification extends Notification
{
    use Queueable;


    protected $ticket;

    /**
     * Create a new notification instance.
     */
    public function __construct($ticket)
    {
        $this->ticket = $ticket;   // Pasamos la información del ticket cuando se crea la notificación.
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database']; // Define los canales por los cuales se enviará la notificación (por correo electronico y ara almacenar la notificación en la base de datos)
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject(__('notifications.ticket_created'))
            ->line(__('notifications.content_created', [
                'user' => $this->ticket->author->name,
                'title' => $this->ticket->title,
            ]))
            ->action(__('notifications.view_ticket'), url('/user/tickets/' . $this->ticket->id));
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'type'        => 'create',
            'ticket_id'   => $this->ticket->id,
            'title'       => $this->ticket->title,
            'description' => $this->ticket->description,
            'created_by'  => $this->ticket->author->name,
            'created_by_id' => $this->ticket->author->id,
            'priority'    => $this->ticket->priority,
            'status'      => $this->ticket->status,
        ];
    }
}

