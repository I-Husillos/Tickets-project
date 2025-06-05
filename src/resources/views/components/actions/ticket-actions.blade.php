<div class="btn-group" role="group">
    <a href="{{ $viewUrl }}" class="btn btn-info btn-sm">
        <i class="fas fa-eye"></i>
    </a>

    @if ($ticket->status === 'closed')
        <button class="btn btn-success btn-sm btn-reopen-ticket"
                data-ticket-id="{{ $ticket->id }}">
            <i class="fas fa-undo"></i> {{ __('Reabrir') }}
        </button>
    @else
        <button class="btn btn-danger btn-sm btn-close-ticket"
                data-ticket-id="{{ $ticket->id }}">
            <i class="fas fa-times"></i> {{ __('Cerrar') }}
        </button>
    @endif
</div>
