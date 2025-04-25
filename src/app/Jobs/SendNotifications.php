<?php

namespace App\Jobs;

use App\Models\Ticket;
use App\Models\Admin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Notifications\TicketCreatedNotification;
use App\Notifications\TicketCommented;
use App\Notifications\TicketStatusChanged;
use App\Notifications\TicketClosed;
use App\Notifications\TicketReopened;
use Illuminate\Support\Facades\Log;



class SendNotifications implements ShouldQueue
{
    use Queueable;

    protected $ticket;
    protected $type;
    protected $comment;
    protected $actor;
    protected mixed $extraData;

    /**
     * Create a new job instance.
     */
    public function __construct($ticketId, string $type, $extraData = null)
    {
        $this->ticket = $ticketId;
        $this->type = $type;
        $this->extraData = $extraData;

        if ($type === 'commented' || $type === 'user_commented') {
            $this->comment = $extraData;
        }

        if ($type === 'status_changed') {
            $this->actor = $extraData;
        }
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info("ID del ticket recibido: {$this->ticket}");
        $ticket = $this->ticket instanceof Ticket ? $this->ticket->load(['user', 'admin']): Ticket::with(['user', 'admin'])->find($this->ticket);


        $admin = is_int($this->actor) ? Admin::find($this->actor) : $this->actor;

        if (!$ticket) {
            Log::warning("Ticket no encontrado: {$this->ticket}");
            return;
        }

        switch ($this->type) {
            case 'created':
                $admins = Admin::all();
            foreach ($admins as $admin) {
                $admin->notify(new TicketCreatedNotification($ticket));
            }
            break;

            case 'commented':
                if ($ticket->user) {
                    $ticket->user->notify(new TicketCommented($ticket, $this->comment));
                }
                break;

            case 'user_commented':
                if ($ticket->admin) {
                    $ticket->admin->notify(new TicketCommented($ticket, $this->extraData));
                } else {
                    $admins = Admin::all(); // o filtra los superadmins
                    foreach ($admins as $admin) {
                        $admin->notify(new TicketCommented($ticket, $this->extraData));
                    }
                }
                break;

            case 'status_changed':
                // Verificar si el usuario está relacionado con el ticket antes de notificar
                if ($ticket->user) {
                    $ticket->user->notify(new TicketStatusChanged($ticket, $this->extraData));
                }
                break;

                case 'closed':
                    if ($ticket->user) {
                        // Obtener el administrador asociado al ticket
                        $admin = $ticket->admin; // Asumiendo que el ticket tiene una relación con un admin
                
                        if ($admin) {
                            // Si el ticket tiene un admin asociado, enviamos la notificación
                            $ticket->user->notify(new TicketClosed($ticket, $admin));
                        } else {
                            // Si no hay administrador, logueamos un error o manejamos el caso
                            Log::warning("No admin found for ticket: {$ticket->id}");
                            // Aquí puedes decidir si notificar a los administradores generales o tomar otra acción
                        }
                    }
                    break;
                
        
            case 'reopened':
                // Agregar notificación para el ticket reabierto
                if ($ticket->user) {
                    $ticket->user->notify(new TicketReopened($ticket, $admin));
                }
                break;
        
            default:
                Log::warning("Tipo de notificación desconocido: {$this->type}");
                break;
        }
    }
}

// php artisan queue:work redis