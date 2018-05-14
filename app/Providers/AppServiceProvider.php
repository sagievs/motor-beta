<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Page;
use App\Post;
use App\Product;
use App\Slide;
use App\Detail;
use View;
use App\Action;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['partials.statsidebar', 'partials.articles-home'], function($view)
        {
            /* $articles = Cache::remember('articles', 22*60, function() {
                return Article::all(); todo
            }); */
            $mainArticles = Post::active()
			->where('ismain', 1)
            ->get();
            $view->with(compact('mainArticles'));
        });
        view()->composer(['partials.header', 'partials.footer'], function($view)
        {
            $mainPages = Page::where('ismain', 1)
            ->get();
            $view->with(compact('mainPages'));
        });
		view()->composer(['home'], function($view)
        {
            $promo = Page::where('slug', 'promo')
            ->first();
            $view->with(compact('promo'));
        });
        view()->composer(['partials.recomended', 'partials.recomended-home'], function($view)
        {
            $recomended = Product::where('ismain', 1)
            ->get();
            $view->with(compact('recomended'));
        });
        view()->composer(['partials.advantages'], function($view)
        {
            $advantages = Slide::where('type', 'advantage')
            ->active()
            ->get();
            $view->with(compact('advantages'));
        });
        view()->composer(['partials.footer'], function($view)
        {
            $tree = Category::where('parent_id', 0)
            ->get()->keyBy('slug');
            $view->with(compact('tree'));
        });
        $details = Detail::all();
        foreach ($details as $detail) {
            View::share($detail->key, $detail->value);
        }
        $monthes = array(
            1 => 'Января', 2 => 'Февраля', 3 => 'Марта', 4 => 'Апреля',
            5 => 'Мая', 6 => 'Июня', 7 => 'Июля', 8 => 'Августа',
            9 => 'Сентября', 10 => 'Октября', 11 => 'Ноября', 12 => 'Декабря'
        );
        View::share('monthes', $monthes);
        /* view()->composer(['partials.header', 'partials.footer'], function($view)
        {
            $detail = Detail::pluck('key', 'value')->first();
            dd($detail);
            $view->with(compact('detail'));
        }); */
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
