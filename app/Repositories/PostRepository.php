<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Post;

interface PostRepository
{
    /**
     * Creates and returns a post
     * @param  string $title The post title
     * @param  string $content The post content
     * @param  User   $author The post creator
     * @return Post   The created post
     */
    public function create(string $title, string $content, User $author): Post;
}