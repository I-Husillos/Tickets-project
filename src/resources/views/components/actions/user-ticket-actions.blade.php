<a href="{{ route('user.tickets.show', ['locale' => $locale, 'ticket' => $ticket, 'username' => $ticket->user_id]) }}"
   class="btn btn-sm btn-info">
    <i class="fas fa-eye"></i> {{ __('Ver') }}
</a>

<a href="{{ route('user.tickets.edit', ['locale' => $locale, 'ticket' => $ticket, 'username' => $ticket->user_id]) }}"
   class="btn btn-sm btn-warning">
    <i class="fas fa-edit"></i> {{ __('Editar') }}
</a>

<form action="{{ route('user.tickets.destroy', ['locale' => $locale, 'ticket' => $ticket->id]) }}"
      method="POST" class="d-inline"
      onsubmit="return confirm('{{ __('¿Estás seguro de eliminar este ticket?') }}')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">
        <i class="fas fa-trash-alt"></i> {{ __('Eliminar') }}
    </button>
</form>
