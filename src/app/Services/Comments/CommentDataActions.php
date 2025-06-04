<?php

namespace App\Services\Comments;

use App\Models\Comment;


class CommentDataActions{

    public function transform(Comment $comment): array
    {
        return [
            'author' => $comment->author->name,
            'message' => $comment->message,
            'date' => $comment->created_at->format('d/m/Y H:i'),
            'actions' => view('components.actions.comment-actions', compact('comment'))->render(),
        ];
    }
}