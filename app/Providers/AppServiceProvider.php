<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\View;
use App\Helpers\Recusive;
use App\Models\Category;
use App\Models\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('today', Date::now()->format('d-m-Y'));
        $categories = Category::all();
        $recusive = new Recusive($categories);
        $htmlMenu = $recusive->showMenu($categories, $parentId = '');
        View::share('htmlMenu', $htmlMenu);
        $footerPost = Post::orderBy('created_at', 'asc')->with('user', 'category')->paginate(config('common.post.footer'));
        View::share('footerPost', $footerPost);
        $footerCategory = Category::take(config('common.category.footer'))->get();
        View::share('footerCategory', $footerCategory);
    }
}
