<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Post;
use App\Http\Requests\PostStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostController extends Controller
{
    public function create(PostStoreRequest $request) {
        $post = new Post();
        $post->content = $request->get('content');
        $post->title = $request->get('title');
        $post->user_id = Auth::id();
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

        return redirect(route('home'))
            ->withSuccessMessage('Post (id: ' . $post->id . ') deleted successfully!');
    }

    public function show(string $id) {
        try {
            $post = Post::findOrFail($id);
            return view('post.show')->with([
                'post' => $post
            ]);
        } catch (ModelNotFoundException $e) {
            return redirect(route('home'))->withErrorMessage("The requested post (id: $id) was not found.");
        }
        
    }
}
