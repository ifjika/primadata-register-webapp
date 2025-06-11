<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function ($user) {
            return $user->role === 'admin';
        });

        Gate::define('leader', function ($user) {
            return $user->role === 'leader';
        });

        Gate::define('user', function ($user) {
            return $user->role === 'user';
        });

        // Jika ingin bisa akses oleh admin atau leader
        Gate::define('admin_or_leader', function ($user) {
            return in_array($user->role, ['admin', 'leader']);
        });

        // Contoh: jika ingin bisa akses oleh semua role
        Gate::define('admin_user_leader', function ($user) {
            return in_array($user->role, ['admin', 'leader', 'user']);
        });
    }
}
