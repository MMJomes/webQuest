<?php

namespace App\Providers;

use App\Repositories\Impls\TagRepositoryImpl;
use App\Repositories\Interf\TagRepository;
use Illuminate\Support\ServiceProvider;
class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(TagRepository::class, TagRepositoryImpl::class);

    }
}
