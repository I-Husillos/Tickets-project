@extends('layouts.frontoffice')

@section('content')
<div class="container mt-5">
    <h2>{{ __('frontoffice.tickets.detail_tiket') }}</h2>
    <div class="mt-3">
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

    @if ($ticket->status === 'resolved')
        <form method="POST" action="{{ route('user.tickets.validate', ['locale' => app()->getLocale(), 'ticket' => $ticket->id]) }}" class="mt-4">
            @csrf
            <button type="submit" name="status" value="resolved" class="btn btn-success">{{ __('frontoffice.tickets.validate') }}</button>
            <button type="submit" name="status" value="pending" class="btn btn-danger">{{ __('frontoffice.tickets.unvalidate') }}</button>
        </form>
    @endif


    <div class="mt-4">
        <h4>{{ __('frontoffice.tickets.add_comment_heading') }}</h4>
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

    <a href="{{ route('user.tickets.index', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary mt-3">{{ __('frontoffice.tickets.return_to_ticket_list') }}</a>
</div>
@endsection

