<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Comment;

class CommentController extends Controller
{

    public function addNewComment(Request $request, $postId) {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);
    
        $user = Auth::user();
    
        $comment = new Comment([
            'user_id' => $user->id,
            'post_id' => $postId,
            'comment' => $request->input('comment'),
        ]);
    
        $comment->save();
    
        return redirect()->route('dashboard'); 
    }

}