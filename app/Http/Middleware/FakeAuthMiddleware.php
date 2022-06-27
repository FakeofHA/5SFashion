<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Views\DefaultView;
use App\Models\FlagToken;
use Cookie;

class FakeAuthMiddleware
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
        if (!Cookie::has('access_token'))
			return DefaultView::False('Cookie does not exist', null, null);

		$flagToken = FlagToken::where('token', $request->cookie('access_token'))->first();
		if (!$flagToken)
			return DefaultView::False('Invalid cookie', null, null);

		if ($flagToken->userAgent != $request->server('HTTP_USER_AGENT'))
			return DefaultView::False('Cookie does not match browser', null, null);

        $request->headers->set('authorization', 'Bearer '.$request->cookie('access_token'), false);

        return $next($request);
    }
}
