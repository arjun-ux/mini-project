<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Role;
use App\Models\User;
use App\Policies\RolePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Role::class => RolePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();


        Gate::define('superadmin', function(User $user){
            return $user->Roles->name === 'superadmin';
        });
        Gate::define('manager', function(User $user){
            return $user->Roles->name === 'manager';
        });
        Gate::define('staff', function(User $user){
            return $user->Roles->name === 'staff';
        });
        Gate::define('peternak', function(User $user){
            return $user->Roles->name === 'peternak';
        });
    }
}
