<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'isLogin' => \App\Http\Middleware\isLogin::class,
        'notLogin' => \App\Http\Middleware\notLogin::class,
        'isAdmin' => \App\Http\Middleware\isAdmin::class,
        'CreateUser' => \App\Http\Middleware\CreateUser::class,
        'UpdateUser' => \App\Http\Middleware\UpdateUser::class,
        'DeleteUser' => \App\Http\Middleware\DeleteUser::class,
        'CreateSkill' => \App\Http\Middleware\CreateSkill::class,
        'DeleteSkill' => \App\Http\Middleware\DeleteSkill::class,
        'CreateExperience' => \App\Http\Middleware\CreateExperience::class,
        'DeleteExperience' => \App\Http\Middleware\DeleteExperience::class,
        'CreateProject' => \App\Http\Middleware\CreateProject::class,
        'DeleteProject' => \App\Http\Middleware\DeleteProject::class,
        'DeleteMessage' => \App\Http\Middleware\DeleteMessage::class,
        'UpdateProject' => \App\Http\Middleware\UpdateProject::class,
        'UpdateAboutPage' => \App\Http\Middleware\UpdateAboutPage::class,
        'UpdateHomePage' => \App\Http\Middleware\UpdateHomePage::class,
        'ViewMessage' => \App\Http\Middleware\ViewMessage::class,
    ];
}
