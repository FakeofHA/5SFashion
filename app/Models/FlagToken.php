<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FlagToken extends Model
{
    use HasFactory;

    protected $fillable = [
		'userId',
		'ipAddress',
		'userAgent',
		'token',
	];

	public function Users() {
		return $this->hasMany(User::class);
	}

	public static function AccessToken($request) {
		if (! $accessToken = auth()->attempt($request->valid->validated()))
			return null;

		$flagToken = FlagToken::where('userAgent', $request->server('HTTP_USER_AGENT'))->first();
		if ($flagToken)
			$flagToken->delete();

		FlagToken::create([
			'userId' => auth()->user()->id,
			'ipAddress' => $request->ip(),
			'userAgent' => $request->server('HTTP_USER_AGENT'),
			'token' => $accessToken,
		]);

		return $accessToken;
	}
}
