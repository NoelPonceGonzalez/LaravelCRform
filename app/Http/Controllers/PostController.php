<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

class PostController extends Controller
{
    public function Post()
    {
        $post = Post::all();

        $comments = Comment::all();

        $users = User::all();

        return view('dashboard', ['posts' => $post, 'title', 'comments' => $comments, 'user' => $users]);
    }

    public function create(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        
        $user = Auth::user();

        $post = new Post([
            'user' => $user->name,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        $post->save();

        return redirect()->route('dashboard');
    }
}