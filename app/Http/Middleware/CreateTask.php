<?php

namespace App\Http\Middleware;

use App\Models\RoleAndPermission;
use Closure;
use Illuminate\Http\Request;

class CreateTask
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
            if ($user_perm->permission_id === 19) {
                return $next($request);
            }
        }

        return abort(403, 'Access denied.');
    }
}
