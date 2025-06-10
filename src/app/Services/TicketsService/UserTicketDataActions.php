<?php


namespace App\Services\TicketsService;

use Illuminate\Support\Facades\View;

class UserTicketDataActions
{
    protected $viewComponent;

    public function __construct()
    {
        $this->viewComponent = 'components.actions.user-ticket-actions';
    }

    public function transform($ticket, $locale): array
    {
        return [
            'title' => $ticket->title,
            'status' => ucfirst($ticket->status),
            'priority' => ucfirst($ticket->priority),
            'comments_count' => $ticket->comments->count(),
            'created_at' => $ticket->created_at->format('d/m/Y'),
            'actions' => View::make($this->viewComponent, [
                'ticket' => $ticket,
                'locale' => $locale
            ])->render(),
        ];
    }
}
