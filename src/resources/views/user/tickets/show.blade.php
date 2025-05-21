@extends('layouts.user')

@section('title', __('frontoffice.tickets.detail_tiket'))

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3>{{ __('frontoffice.tickets.detail_tiket') }}</h3>
        </div>
        <div class="card-body">
            <p><strong>{{ __('frontoffice.tickets.title') }}:</strong> {{ $ticket->title }}</p>
            <p><strong>{{ __('frontoffice.tickets.description') }}:</strong> {{ $ticket->description }}</p>
            <p><strong>{{ __('frontoffice.tickets.type') }}:</strong> {{ ucfirst($ticket->type) }}</p>
            <p><strong>{{ __('frontoffice.tickets.priority') }}:</strong> {{ ucfirst($ticket->priority) }}</p>
            <p><strong>{{ __('frontoffice.tickets.status') }}:</strong> 
                <span class="badge 
                    @if($ticket->status === 'new') badge-primary 
                    @elseif($ticket->status === 'resolved') badge-success 
                    @elseif($ticket->status === 'pending') badge-warning 
                    @else badge-secondary 
                    @endif">
                    {{ ucfirst($ticket->status) }}
                </span>
            </p>
            <p><strong>{{ __('frontoffice.tickets.created_at') }}:</strong> {{ $ticket->created_at->format('d/m/Y') }}</p>
        </div>
    </div>

    @if ($ticket->status === 'resolved')
        <form method="POST" action="{{ route('user.tickets.validate', ['locale' => app()->getLocale(), 'ticket' => $ticket->id]) }}" class="mt-4">
            @csrf
            <button type="submit" name="status" value="resolved" class="btn btn-success">{{ __('frontoffice.tickets.validate') }}</button>
            <button type="submit" name="status" value="pending" class="btn btn-danger">{{ __('frontoffice.tickets.unvalidate') }}</button>
        </form>
    @endif

    <div class="card mt-4">
        <div class="card-header bg-secondary text-white">
            <h4>{{ __('frontoffice.tickets.add_comment_heading') }}</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('ticket.add.comment', ['locale' => app()->getLocale(), 'ticket' => $ticket]) }}">
                @csrf
                <div class="form-group">
                    <textarea 
                        name="message" 
                        class="form-control" 
                        rows="4" 
                        placeholder="{{ __('frontoffice.tickets.comment_placeholder') }}"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-3">{{ __('frontoffice.tickets.add_comment') }}</button>
            </form>
        </div>
    </div>

    <!-- Sección de Comentarios -->
    @if ($ticket->comments->isNotEmpty())
        <div class="card mt-4">
            <div class="card-header bg-info text-white">
                <h4>{{ __('frontoffice.tickets.comments') }}</h4>
            </div>
            <div class="card-body">
                @foreach ($ticket->comments as $comment)
                    <div class="alert alert-secondary">
                        <p><strong>{{ $comment->user }}</strong> ({{ $comment->created_at->format('d/m/Y H:i') }}):</p>
                        <p>{{ $comment->message }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <a href="{{ route('user.tickets.index', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary mt-3">
        {{ __('frontoffice.tickets.return_to_ticket_list') }}
    </a>
</div>
@endsection





