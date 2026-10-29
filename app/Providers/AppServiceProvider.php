<?php

namespace App\Providers;

use App\Constants\General;
use App\Constants\TheURL;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        //
        Schema::defaultstringLength(191);

        // Initialize TheURL constants from configuration
        TheURL::init();

        view()->share('General', General::class);

    }
}
