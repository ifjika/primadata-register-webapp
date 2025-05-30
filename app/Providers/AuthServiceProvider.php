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

        // Jika ingin bisa pake array misal admin atau leader
        Gate::define('admin_or_leader', function ($user) {
            return in_array($user->role, ['admin', 'leader']);
        });
    }
}
