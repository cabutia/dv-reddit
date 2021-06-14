<?php

namespace App\Services;

use App\Models\User;
use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Support\Collection;

class PostFileSystemService implements PostRepository
{
    /**
     * @inheritDoc
     */
    public function create(string $title, string $content, User $author): Post
    {
      $postArray = $this->readJsonFile();

      $post = new Post();
      $post->id = microtime();
      $post->title = $title;
      $post->content = $content;
      $post->user_id = $author->id;

      array_push($postArray, $post);
      $this->writeJsonFile($postArray);
      return $post;
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): bool
    {}

    /**
     * @inheritDoc
     */
    public function find(int $id):? Post
    {}

    /**
     * @inheritDoc
     */
    public function all(): Collection
    {
      $rawposts = $this->readJsonFile();
      $posts = [];
      foreach ($rawposts as $rawpost) {
        $post = new Post();
        $post->id = $rawpost->id;
        $post->title = $rawpost->title;
        $post->content = $rawpost->content;
        $post->user_id = $rawpost->user_id;
        array_push($posts, $post);
      }
      return new Collection($posts);
    }

    /**
     * Reads and returns the posts file.
     */
    private function readJsonFile(): array
    {
      $path = storage_path('/posts.json');
      if (!file_exists($path)) {
        $this->writeJsonFile([]);
      }
      $contents = file_get_contents($path);
      if (!$contents) return [];
      return json_decode($contents);
    }

    /**
     * Writes new content to the posts file.
     */
    private function writeJsonFile(array $posts): void
    {
      $path = storage_path('/posts.json');
      file_put_contents($path, json_encode($posts));
    }
}