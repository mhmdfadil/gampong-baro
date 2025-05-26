<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // Tambahkan ini
use App\Models\SocialMedia; // Tambahkan ini

class ViewComposerServiceProvider extends ServiceProvider
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
   public function boot()
{
    View::composer('partials.footer', function ($view) {
        $socialMedia = SocialMedia::first();
        $view->with('socialMedia', $socialMedia);
    });
}
}
