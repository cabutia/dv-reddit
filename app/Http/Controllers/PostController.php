<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Post;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostDeleteRequest;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Services\PostService;
use App\Repositories\PostRepository;

class PostController extends Controller
{
    public $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function create(PostStoreRequest $request) {
        $this->postRepository->create(
            $request->get('title'),
            $request->get('content'),
            Auth::user()
        );
        
        return back()
            ->withSuccessMessage('Post created successfully!');
    }

    public function delete(PostDeleteRequest $request) {
        $post = Post::find($request->get('id'));
        $post->delete();

        return redirect(route('home'))
            ->withSuccessMessage('Post (id: ' . $post->id . ') deleted successfully!');
    }

    public function show(string $id) {
        try {
            $post = Post::findOrFail($id);
            return view('pages.posts.show.show')->with([
                'post' => $post
            ]);
        } catch (ModelNotFoundException $e) {
            return redirect(route('home'))->withErrorMessage("The requested post (id: $id) was not found.");
        }
        
    }
}