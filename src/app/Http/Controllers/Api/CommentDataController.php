<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Services\Comments\CommentDataActions;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Ticket;

class CommentDataController extends Controller
{
    protected $actions;

    public function __construct(CommentDataActions $actions)
    {
        $this->actions = $actions;
    }

    public function index(Ticket $ticket)
    {
        $query = $ticket->comments()->with('author');

        return DataTables::of($query)
            ->addColumn('author', fn($comment) => $comment->author->name)
            ->addColumn('date', fn($comment) => $comment->created_at->format('d/m/Y H:i'))
            ->addColumn('actions', fn($comment) => view('components.actions.comment-actions', compact('comment'))->render())
            ->rawColumns(['actions'])
            ->toJson();
    }
}
