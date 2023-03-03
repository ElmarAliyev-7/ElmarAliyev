<?php

namespace App\Providers;

use App\Models\Message;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\RoleAndPermission;
use App\Models\HomePage;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Schema;

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
        if (Schema::hasTable('role_and_permissions'))
        {
            View::composer([
                'back.layouts.menu', 'back.users.index', 'back.my-skills.index',
                'back.experience.index', 'back.portfolio.index', 'back.message',
                'back.home', 'back.about'
            ], function ($view) {
                $auth_user_perms = RoleAndPermission::where("role_id", auth()->user()->role_id)->get();
                $view->with('auth_user_perms', $auth_user_perms);
            });
        }

        if (Schema::hasTable('home_pages') and Schema::hasTable('messages')
            and Schema::hasTable('portfolios'))
        {
            $home_page = HomePage::find(1);
            View::share([
                'unchecked_messages' => Message::where('seen', 0)->get(),
                'home_page'          => $home_page,
                'home_subtitle_array'=> explode(" ", $home_page->subtitle),
                'experience_count'   => Portfolio::count(),
            ]);
        }
    }
}
