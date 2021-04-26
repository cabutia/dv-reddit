<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function create(Request $request) {
        $request->validate([
            'content' => 'required|max:255'
        ]);
        
        $post = new Post();
        $post->content = $request->get('content');
        $post->save();
        
        return back()
            ->withSuccessMessage('Post created successfully!');
    }

    public function delete(Request $request) {
        $request->validate([
            'id' => 'numeric|exists:posts,id'
        ]);
        
        $post = Post::find($request->get('id'));
        $post->delete();

        return back()
            ->withSuccessMessage('Post (id: ' . $post->id . ') deleted successfully!');
    }
}   