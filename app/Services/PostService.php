<?php

namespace App\Services;

use App\Models\User;
use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Support\Collection;

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

    /**
     * @inheritDoc
     */
    public function delete(int $id): bool
    {
        $post = Post::find($id);
        $post->delete();
        return true;
    }

    /**
     * @inheritDoc
     */
    public function find(int $id):? Post
    {
        $post = Post::find($id);
        return $post;
    }

    /**
     * @inheritDoc
     */
    public function all(): Collection
    {
        $posts = Post::all();
        return $posts;
    }
}