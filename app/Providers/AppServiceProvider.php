<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use App\Models\Post;
use App\Models\Admin;
use App\Models\Comment;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $author = User::whereHas('role', function($q) {
                            $q->where('slug', 'admin');
                        })->first();
        $categories =  Category::where('is_active', 1)->get();

        $postsRecents = Post::where('is_active', 1)
                        ->where('seen', 1)
                        ->orderBy('created_at', 'desc')
                        ->take(3)->get();
        $postsPopular = Post::where('is_active', 1)
                                ->where('seen', 1)
                                ->orderBy('nview', 'desc')
                                ->take(3)->get();
        $commentsRecents = Comment::where('seen', 1)
                                    ->orderBy('created_at', 'desc')
                                    ->take(3)
                                    ->get();
        $tags = Tag::all();
        $INFO_SITE = Admin::first();

        view()->share('author', $author);
        view()->share('categories', $categories);
        view()->share('tags', $tags);
        view()->share('postsRecents', $postsRecents);
        view()->share('postsPopular', $postsPopular);
        view()->share('commentsRecents', $commentsRecents);
        view()->share('INFO_SITE', $INFO_SITE);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
