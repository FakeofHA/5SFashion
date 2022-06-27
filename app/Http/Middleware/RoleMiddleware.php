<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Views\DefaultView;
use App\Models\Role;
use Exception;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $roleName)
    {
        try{
            if (auth()->user()->roleId > Role::where('name', $roleName)->first()->id)
                return DefaultView::False('User lacks access', null, null);
        }
        catch(Exception $exception) {
            return DefaultView::False('User lacks access', null, $exception);
        }

        return $next($request);
    }
}
