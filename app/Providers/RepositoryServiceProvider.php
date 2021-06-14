<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\PostRepository;
use App\Services\PostService;
use App\Services\PostFileSystemService;

class RepositoryServiceProvider extends ServiceProvider
{

    public $bindings = [
        PostRepository::class => PostService::class
    ];
}
