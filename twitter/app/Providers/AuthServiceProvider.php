<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }
    protected $policies = [
        //
    ];

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::define('admin', function (User $user) {
            return (bool) $user->is_admin;
        });

        //permissions

        Gate::define('idea.edit', function (User $user, $idea) {
            return $user->id === $idea->user_id || $user->is_admin;
        });
        Gate::define('idea.delete', function (User $user, $idea) {
            return $user->id === $idea->user_id || $user->is_admin;
            // if the user is the owner of the idea or the user is an admin
        });
    }
}
