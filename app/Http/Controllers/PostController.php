<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function Post()
    {
        $post = Post::all();

        return view('dashboard', ['posts' => $post, 'title']);
    }
}