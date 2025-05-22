<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        View::composer(['components.header', 'components.main_menu'], function ($view) {
            $categoryLimit = Category::where('parent_id', 0)->take(3)->get();
            $view->with('categoryLimit', $categoryLimit);
        });
    }
}
