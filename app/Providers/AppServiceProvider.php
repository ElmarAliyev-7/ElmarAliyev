<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\RoleAndPermission;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['back.layouts.menu', 'back.users.index'], function ($view) {
            $auth_user_perms = RoleAndPermission::where("role_id", auth()->user()->role_id)->get();
            $view->with('auth_user_perms', $auth_user_perms);
        });
    }
}
