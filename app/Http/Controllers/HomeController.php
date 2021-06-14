<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Repositories\PostRepository;

class HomeController extends Controller
{
    public $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function homepage() 
    {
        $posts = $this->postRepository->all();
        return view('pages.home.home')
            ->with([
                'posts' => $posts
            ]);
    }
}
