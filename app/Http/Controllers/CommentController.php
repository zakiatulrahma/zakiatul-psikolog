<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'rating' => 'required',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'content' => $request->input('content'),
            'rating' => $request->input('rating'),
        ]);

        return redirect()->route('user.home')->with('success', 'Comment added');
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        if ($comment) {
            $comment->delete();
        }

        return redirect()->route('admin.home')->with('success', 'Comment deleted');
    }

    public function showAll(){
        
        $comments = Comment::orderBy('updated_at', 'desc')->get();
        $total_comment = Comment::count();
        return view('admin.all_comment', compact('comments', 'total_comment'));
    }
}
