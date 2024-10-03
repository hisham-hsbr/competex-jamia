<?php

namespace App\Providers;

use App\Models\Settings;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

        $run_seeder_disable = env('RUN_SEEDER_DISABLE');

        if ($run_seeder_disable == 'Y') {
            $settings = Settings::all()->pluck('default_value', 'name');
            View::share('settings', $settings);
        }
    }
}
