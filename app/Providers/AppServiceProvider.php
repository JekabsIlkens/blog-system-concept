<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Interfaces\RegisterServiceInterface;
use App\Http\Services\RegisterService;
use App\Http\Interfaces\LoginServiceInterface;
use App\Http\Services\LoginService;
use App\Http\Interfaces\PostsServiceInterface;
use App\Http\Services\PostsService;
use App\Http\Interfaces\CommentServiceInterface;
use App\Http\Services\CommentService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RegisterServiceInterface::class, RegisterService::class);
        $this->app->bind(LoginServiceInterface::class, LoginService::class);
        $this->app->bind(PostsServiceInterface::class, PostsService::class);
        $this->app->bind(CommentServiceInterface::class, CommentService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
