<?php

namespace App\Providers;

use App\Models\Message;
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
        View::composer([
            'back.layouts.menu', 'back.users.index', 'back.my-skills.index',
            'back.experience.index', 'back.portfolio.index', 'back.message',
            'back.home', 'back.about','back.profile.index'
        ], function ($view) {
            $auth_user_perms = RoleAndPermission::with('permission')
                ->where("role_id", auth()->user()->role_id)->get();
            $view->with('auth_user_perms', $auth_user_perms);
        });

        View::share(['unchecked_messages' => Message::where('seen', 0)->get()]);
    }
}
