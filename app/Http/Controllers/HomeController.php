<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function homepage() 
    {
        $posts = Post::all();
        return view('pages.home.home')
            ->with([
                'posts' => $posts
            ]);
    }
}
