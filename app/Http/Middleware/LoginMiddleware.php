<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Validator;
use App\Models\Views\DefaultView;

class LoginMiddleware
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
			'email' => 'required|string|email|max:255',
			'password' => 'required',
		]);

		if ($valid->fails())
			return DefaultView::False('Login failed', null, $valid->errors());
		$request->request->add(['valid' => $valid]);

        return $next($request);
    }
}
