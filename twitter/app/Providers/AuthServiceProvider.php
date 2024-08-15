<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Idea;

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
        Idea::class => IdeaPolicy::class,
    ];

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::define('admin', function (User $user) {
            return (bool) $user->is_admin;
        });
        $this->registerPolicies();

        //permissions

        // Gate::define('idea.edit', function (User $user,Idea $idea) {
        //     return $user->id === $idea->user_id || $user->is_admin;
        // });
        // Gate::define('idea.delete', function (User $user,Idea $idea) {
        //     return $user->id === $idea->user_id || $user->is_admin;
        // });
    }
}
