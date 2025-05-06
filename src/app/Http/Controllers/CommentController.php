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
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function addComment(StoreCommentRequest $request, Ticket $ticket)
    {
        $this->authorize('comment', $ticket);
        $validated = $request->validated();

        $this->commentService->addComment($ticket, $validated['message']);


        if (auth('admin')->check()) {
            return redirect()->route('admin.manage.tickets')->with('success', 'Comentario agregado correctamente.');
        }


        return redirect()->route('user.tickets.index')->with('success', 'Comentario agregado correctamente.');
    }

    public function viewComments(Ticket $ticket)
    {
        $comments = $ticket->comments()->with('author')->get();
        return view('backoffice.comments.index', compact('comments', 'ticket'));
    }



    public function deleteComment(Comment $comment)
    {
        $this->authorize('delete', $comment);
        
        $comment->delete();

        return redirect()->back()->with('success', 'Comentario eliminado correctamente.');
    }
}


//php artisan queue:work redis