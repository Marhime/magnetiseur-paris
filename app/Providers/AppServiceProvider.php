<?php

namespace App\Providers;

use Illuminate\Support\Pluralizer;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //Public folder name changed with public_html
        $this->app->bind('path.public', function () {
            return base_path().'/public_html';
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Pluralizer::useLanguage('french');
        if (config('app.env') === 'production') {
            URL::forceRootUrl(config('app.url'));
        }
    }
}
