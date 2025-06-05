<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Services\Comments\CommentDataActions;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Ticket;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;

class CommentDataController extends Controller
{
    protected $actions;

    public function __construct(CommentDataActions $actions)
    {
        $this->actions = $actions;
    }

    public function viewComments(Request $request, Ticket $ticket)
    {
        $locale = $request->header('X-Locale') ?? $request->input('locale') ?? 'en';
        App::setLocale($locale);

        $comments = $ticket->comments()->with('author')->get();

        $data = $comments->map(function ($comment) use ($locale) {
            $view = View::make('components.actions.comment-actions', compact('comment'))->render();
    
            return [
                'author' => $comment->author->name,
                'message' => $comment->message,
                'date' => $comment->created_at->format('d/m/Y H:i'),
                'actions' => $view,
            ];
        });
    
        return response()->json([
            'data' => $data,
        ]);
    }

    public function deleteComment(Comment $comment)
    {
        if (!auth()->user()->can('delete', $comment)) {
            return response()->json(['error' => 'No autorizado'], 403);
        }

        $comment->delete();

        return response()->json(['success' => true, 'message' => 'Comentario eliminado correctamente']);
    }

}


