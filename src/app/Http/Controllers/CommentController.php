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

class CommentController
{
    public function addComment(Request $request, Ticket $ticket)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $author = Auth::user();

        $comment = $ticket->comments()->create([
            'author_id' => Auth::id(),
            'author_type' => Auth::user() instanceof Admin ? Admin::class : User::class,
            'message' => $validated['message'],
        ]);


        EventHistory::create([
            'event_type' => 'Comentario',
            'description' => 'Se ha agregado un nuevo comentario en tu ticket.',
            'user' => $author->name,
        ]);

        if ($author instanceof Admin && $ticket->user) {
            SendNotifications::dispatch($ticket->id, 'commented', $comment);
        } elseif ($author instanceof User && $ticket->admin) {
            SendNotifications::dispatch($ticket->id, 'user_commented', $comment);
        }        

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