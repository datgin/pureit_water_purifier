<?php

namespace App\Providers;

use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        $productCategories = Category::where('status', 1)->where('type', 'product')->get();
        $blogCategories = Category::where('status', 1)->where('type', 'blog')->get();
        $setting = Config::firstOrCreate();

        $advertisement_front = Advertisement::firstOrCreate();

        View::share('productCategories', $productCategories);
        View::share('blogCategories', $blogCategories);
        View::share('setting', $setting);
        View::share('advertisement_front', $advertisement_front);

        URL::forceScheme('https');

    }


}
