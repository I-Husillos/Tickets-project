<?php

namespace App\Http\Controllers;

use App\Jobs\SendNotifications;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Admin;
use App\Models\Comment;
use App\Models\EventHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\CommentService;

class CommentController
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function addComment(Request $request, Ticket $ticket)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $this->commentService->addComment($ticket, $validated['message']);

        return redirect()->back()->with('success', 'Comentario agregado correctamente.');
    }

    public function viewComments(Ticket $ticket)
    {
        $comments = $ticket->comments()->with('author')->get();
        return view('backoffice.comments.index', compact('comments', 'ticket'));
    }



    public function deleteComment(Comment $comment)
    {
        $comment->delete();

        return redirect()->back()->with('success', 'Comentario eliminado correctamente.');
    }
}


//php artisan queue:work redis