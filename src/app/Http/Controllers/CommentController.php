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
use PhpParser\Node\Expr\Cast\String_;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function addComment(StoreCommentRequest $request, String $locale, Ticket $ticket)
    {

        if (!$ticket) {
            return redirect()->back()->with('error', 'El ticket no existe.');
        }
        $this->authorize('comment', $ticket);
        $validated = $request->validated();

        
        $this->commentService->addComment($ticket, $validated['message']);


        if (auth('admin')->check()) {
            return redirect()->route('admin.view.ticket', ['locale' => $locale, 'ticket' => $ticket])->with('success', 'Comentario agregado correctamente.');
        }


        return redirect()->route('user.tickets.edit', ['locale' => $locale, 'ticket' => $ticket])->with('success', 'Comentario agregado correctamente.');
    }

    public function viewComments(Ticket $ticket)
    {
        $comments = $ticket->comments()->with('author')->get();
        return view('.comments.index', compact('comments', 'ticket'));
    }



    public function deleteComment(String $locale, Comment $comment)
    {
        $this->authorize('delete', $comment);
        
        $comment->delete();

        return redirect()->back()->with('success', 'Comentario eliminado correctamente.');
    }
}


//php artisan queue:work redis