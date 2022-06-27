<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Validator;
use App\Models\Views\DefaultView;

class EmployeeUpdateMiddleware
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
        $valid = Validator::make($request->all(), [
			'email' => 'string|email|max:255',
			'name' => 'string|max:255|min:2',
			'password' => 'confirmed|min:8',
		]);
		if ($valid->fails())
			return DefaultView::False('Registration failed', null, $valid->errors());
		$request->request->add(['valid' => $valid]);

        return $next($request);
    }
}
