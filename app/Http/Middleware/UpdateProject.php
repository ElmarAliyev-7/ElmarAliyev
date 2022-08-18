<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\RoleAndPermission;

class UpdateProject
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user_perms  = RoleAndPermission::where("role_id", auth()->user()->role_id)->get();

        foreach ($user_perms as $user_perm) {
            if ($user_perm->permission_id === 9) {
                return $next($request);
            }
        }

        return abort(404);
    }
}
