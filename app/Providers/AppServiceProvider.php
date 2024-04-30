<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\News;
use App\Policies\AdminPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\CommentPolicy;
use App\Policies\NewsPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Category::class, CategoryPolicy::class);
        Gate::policy(News::class, NewsPolicy::class);
        Gate::policy(Comment::class, CommentPolicy::class);
    }
}
