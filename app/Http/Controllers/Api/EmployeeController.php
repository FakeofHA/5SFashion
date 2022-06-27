<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Views\DefaultView;
use Illuminate\Database\QueryException;

class EmployeeController extends Controller
{
    public function __construct() {

	}
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DefaultView::True('Query successfully', User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create(array_merge(
			$request->valid->validated(),
			['password' => bcrypt($request->password)],
            ['roleId' => 2]
		));

        return DefaultView::True('Query successfully', $user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if (is_null($user))
            return DefaultView::False('User not found', null, null);

        return DefaultView::True('Query successfully', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (is_null($user))
            return DefaultView::False('User not found', null, null);

        if ($user->email == $request->email)
            return DefaultView::False('Same with old gmail', $user, null);

        try {
            $user->update(array_merge(
                $request->valid->validated(),
                ['password' => bcrypt($request->password)],
                ['roleId' => 2]
            ));
        }
        catch (QueryException $queryException) {
            return DefaultView::False('Email already exists', $user, $queryException);
        }

        return DefaultView::True('Query successfully', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (is_null($user))
            return DefaultView::False('User not found', null, null);

        $user->delete();

        return DefaultView::True('Query successfully', $user);
    }
}
