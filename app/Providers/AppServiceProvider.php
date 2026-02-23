<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

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
        if(Schema::hasTable("categories")){
            $categories=Category::all();
            View::share("categories",$categories);
        }
        Paginator::useBootstrapFive();

        Password::defaults(function () {
        return Password::min(10)->mixedCase()->numbers()->symbols();
        });
    }
}
