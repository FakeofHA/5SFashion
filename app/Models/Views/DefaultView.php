<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefaultView extends Model
{
    use HasFactory;

    protected $fillable = [
		'status',
		'massage',
		'data',
		'exception',
	];

	public static function True($massage, $data) {
		return response()->json(new DefaultView([
			'status' => true,
			'massage' => $massage,
			'data' => $data,
			'exception' => null,
		]));
	}

	public static function False($massage, $data, $exception) {
		return response()->json(new DefaultView([
			'status' => false,
			'massage' => $massage,
			'data' => $data,
			'exception' => $exception,
		]));
	}
}
