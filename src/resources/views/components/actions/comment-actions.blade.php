@can('delete', $comment)
<form method="POST" action="{{ route('admin.comments.delete', ['comment' => $comment->id, 'locale' => app()->getLocale()]) }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">
        <i class="fas fa-trash-alt"></i> {{ __('general.admin_ticket_details.delete') }}
    </button>
</form>
@endcan
