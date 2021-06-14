<?php

namespace App\Services;

use App\Models\User;
use App\Models\Post;
use App\Repositories\PostRepository;

class PostService implements PostRepository
{
    /**
     * @inheritDoc
     */
    public function create(string $title, string $content, User $author): Post
    {
        $post = new Post();
        $post->title = $title;
        $post->content = $content;
        $post->user_id = $author->id;
        $post->save();
        return $post;
    }
}