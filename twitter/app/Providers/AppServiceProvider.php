<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Debugbar;



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

        paginator::useBootstrapfive();

        Debugbar::enable();

        Cache::forget('topUsers');

        $topUsers = Cache::remember('topUsers', now()->addMinutes(3), function () {
            return User::withCount('ideas')
            ->orderBy('ideas_count', 'desc')
            ->limit(5)->get();
        });

        View::share('topUsers', $topUsers);


    }
}
