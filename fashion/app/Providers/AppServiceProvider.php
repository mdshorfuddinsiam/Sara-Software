<?php

namespace App\Providers;

use App\Models\Category;
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
        
        // View::composer(['admin.layouts.admin-master'], function ($view) {
        //     $view->with('routeName', \Route::currentRouteName());
        // });
        View::composer(['partials.common.sidebar', 'partials.header'], function ($view) {
            $view->with('categories', Category::orderBy('category_name', 'asc')->get());
        });

    }
}
