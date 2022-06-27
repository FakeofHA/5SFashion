<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Validator;
use App\Models\User;
use App\Models\Views\DefaultView;
use Cookie;
use App\Models\FlagToken;

class AuthController extends Controller
{
    public function __construct() {

	}

	public function register(Request $request) {
		$user = User::create(array_merge(
			$request->valid->validated(),
			['password' => bcrypt($request->password)]
		));

		$accessToken = FlagToken::AccessToken($request);
		if ($accessToken == null)
			return DefaultView::False('Unauthorized', null, $request->valid->errors());

		return DefaultView::True('Registered successfully', $user)
			->withCookie(Cookie::forever('access_token', $accessToken));
	}

	public function login(Request $request){
		$accessToken = FlagToken::AccessToken($request);

		if (!$accessToken)
			return DefaultView::False('Login failed', null, $request->valid->errors());

		return DefaultView::True('Login successfully', auth()->user())
			->withCookie(Cookie::forever('access_token', $accessToken));
	}

	public function logout(Request $request) {
		$cookie = Cookie::forget('access_token');
		auth()->logout();
		FlagToken::where('userAgent', $request->server('HTTP_USER_AGENT'))->delete();

		return DefaultView::True('Logout successfully', auth()->user())
			->withCookie($cookie);
	}

	public function information(Request $request) {
		return DefaultView::True('Query successfully', auth()->user());
	}
}
