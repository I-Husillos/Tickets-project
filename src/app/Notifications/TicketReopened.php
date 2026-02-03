<?php
namespace App\Notifications;

use App\Models\Ticket;
use App\Models\Admin;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class TicketReopened extends Notification
{
    protected $ticket;
    protected $admin;

    public function __construct(Ticket $ticket, Admin $admin)
    {
        $this->ticket = $ticket;
        $this->admin = $admin;
    }

    public function via($notifiable)
    {
        return ['mail', 'database']; // Elige los canales que quieres usar
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('El ticket ha sido reabierto.')
                    ->action('Ver Ticket', url('/user/tickets/' . $this->ticket->id))
                    ->line('Reabierto por: ' . $this->admin->name);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable): array
    {
        return [
            'type' => 'reopened',
            'ticket_id' => $this->ticket->id,
            'message' => 'El ticket ha sido reabierto por ' . $this->admin->name,
        ];
    }
}
