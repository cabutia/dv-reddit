<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\PostRepository;
use App\Services\PostService;

class RepositoryServiceProvider extends ServiceProvider
{

    public $bindings = [
        PostRepository::class => PostService::class
    ];
}
