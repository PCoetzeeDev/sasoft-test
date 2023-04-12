<?php

namespace App\Providers;

use App\Base\BaseEntity;
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
        // Don't allow Eloquent to silently fail:
        BaseEntity::preventSilentlyDiscardingAttributes();
        BaseEntity::preventAccessingMissingAttributes();
    }
}
