<?php

namespace App\Providers;

use App\Repositories\Impls\CategoryRepositoryImpl;
use App\Repositories\Impls\ProducteRpositoryImpl;
use App\Repositories\Impls\TagRepositoryImpl;
use App\Repositories\Interf\CategoryRepository;
use App\Repositories\Interf\ProductRepository;
use App\Repositories\Interf\TagRepository;
use Illuminate\Support\ServiceProvider;
class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(TagRepository::class, TagRepositoryImpl::class);
        $this->app->bind(CategoryRepository::class, CategoryRepositoryImpl::class);
        $this->app->bind(ProductRepository::class, ProducteRpositoryImpl::class);

    }
}
