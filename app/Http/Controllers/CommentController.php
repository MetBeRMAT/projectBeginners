<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Idea $idea)
    {

        $comment = Comment::create([
            'idea_id' => $idea->id,
            'content' => request()->get('content'),
        ]);

        $comment->save();


        return redirect()->back()->with('success', 'Comment was added successfully!');
    }
}
