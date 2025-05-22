@extends('layouts.user')

@section('title', __('frontoffice.tickets.detail_tiket'))

@section('content')
@php 
$breadcrumbs = [
    ['label' => __('general.home'), 'url' => route('user.dashboard', ['locale' => app()->getLocale()])],
    ['label' => __('frontoffice.tickets.list_title'), 'url' => route('user.tickets.index', ['locale' => app()->getLocale()])],
    ['label' => __('frontoffice.tickets.detail_tiket')]
];
@endphp


<div class="container">
    {{-- Flash Messages (Bootstrap 4 / AdminLTE) --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
            <i class="fas fa-exclamation-triangle mr-2"></i> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
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
            <form method="POST" action="{{ route('user.tickets.comment', ['locale' => app()->getLocale(), 'ticket' => $ticket]) }}">
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
                <h4>{{ __('frontoffice.tickets.comment') }}</h4>
            </div>
            <div class="card-body p-0">
                <div class="timeline">
                    @foreach ($ticket->comments as $comment)
                        <!-- timeline item -->
                        <div class="time-label">
                            <span class="bg-secondary">
                                {{ $comment->created_at->format('d M Y') }}
                            </span>
                        </div>
                        <div>
                            <i class="fas fa-comment bg-info"></i>
                            <div class="timeline-item">
                                <span class="time">
                                    <i class="far fa-clock"></i> {{ $comment->created_at->format('H:i') }}
                                </span>
                                <h3 class="timeline-header">
                                    <strong>{{ $comment->author->name }}</strong> 
                                </h3>
                                <div class="timeline-body">
                                    {{ $comment->message }}
                                </div>
                            </div>
                        </div>
                        <form 
                            method="POST" 
                            action="{{ route('user.ticket.comment.delete', [
                                'locale' => app()->getLocale(), 
                                'ticket' => $ticket->id,
                                'comment' => $comment->id
                            ]) }}" 
                            style="display:inline"
                            onsubmit="return confirm('{{ __('¿Eliminar este comentario?') }}')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger float-right">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    @endforeach
                    <!-- FIN timeline -->
                    <div>
                        <i class="far fa-clock bg-gray"></i>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <!-- <a href="{{ route('user.tickets.index', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary mt-3">
        {{ __('frontoffice.tickets.return_to_ticket_list') }}
    </a> -->
</div>
@endsection





