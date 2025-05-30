<div class="btn-group" role="group">
    <a href="{{ route('admin.view.ticket', ['ticket' => $ticket->id, 'locale' => app()->getLocale()]) }}" class="btn btn-info btn-sm">
        <i class="fas fa-eye"></i>
    </a>

    @if ($ticket->status === 'closed')
        <form method="POST" action="{{ route('admin.reopen.ticket', ['ticket' => $ticket->id, 'locale' => app()->getLocale()]) }}" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-success btn-sm">
                <i class="fas fa-undo"></i> {{ __('Reabrir') }}
            </button>
        </form>
    @else
        <form method="POST" action="{{ route('admin.close.ticket', ['ticket' => $ticket->id, 'locale' => app()->getLocale()]) }}" class="d-inline">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-danger btn-sm">
                <i class="fas fa-times"></i> {{ __('Cerrar') }}
            </button>
        </form>
    @endif
</div>


