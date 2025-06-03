<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Config;
use Illuminate\Support\Facades\View;
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
        $productCategories = Category::where('status', 1)->where('type', 'product')->get();
        $blogCategories = Category::where('status', 1)->where('type', 'blog')->get();
        $setting = Config::firstOrCreate();

        View::share('productCategories', $productCategories);
        View::share('blogCategories', $blogCategories);
        View::share('setting', $setting);

    }


}
