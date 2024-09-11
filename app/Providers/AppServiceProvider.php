<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use App\Models\SocialMedia;
use Conner\Tagging\Model\Tag;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $socials = SocialMedia::orderBy('id', 'DESC')->get();
        $articles = Article::where('isActive', 1)->get();
        $categories = Category::where('isActive', 1)->get();
        $tags = Tag::all();

        view()->share(
            [
                'global_social' => $socials,
                'articles' => $articles,
                'global_categories' => $categories,
                'global_tags' => $tags,
            ]
        );
    }
}
