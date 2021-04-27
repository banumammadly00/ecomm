<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\CategoryComposer;
use App\Http\View\Composers\AttributeComposer;
use App\Http\View\Composers\ProductsComposer;

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
        View::composer(['admin.categories.*'], CategoryComposer::class);
        View::composer(['admin.attributes.*'], AttributeComposer::class);
        View::composer(['admin.products.*'],   ProductsComposer::class);

    }
}
