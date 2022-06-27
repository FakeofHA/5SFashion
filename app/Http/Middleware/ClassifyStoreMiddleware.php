<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Validator;
use App\Models\Views\DefaultView;

class ClassifyStoreMiddleware
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
			'name' => 'required|string',
			'sex' => 'required|string',
		]);

		if ($valid->fails())
			return DefaultView::False('Query failed', null, $valid->errors());
		$request->request->add(['valid' => $valid]);

        return $next($request);
    }
}
