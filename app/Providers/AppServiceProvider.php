<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;


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
    public function boot()
    {
        view()->composer('*', function ($view) {
            if (auth()->check()) {
                $role = auth()->user()->role;

                switch ($role) {
                    case 'admin':
                        config(['adminlte.logo' => '<b>Admin</b> Menu']);
                        break;

                    case 'leader':
                        config(['adminlte.logo' => '<b>Leader</b> Panel']);
                        break;

                    case 'user':
                    default:
                        config(['adminlte.logo' => '<b>User</b> Menu']);
                        break;
                }
            }
        });
    }
}
