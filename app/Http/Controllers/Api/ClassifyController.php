<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classify;
use App\Models\Views\DefaultView;
use Illuminate\Support\Facades\DB;

class ClassifyController extends Controller
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
        return DefaultView::True('Query successfully', Classify::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        $classify = Classify::create(array_merge(
			$request->valid->validated()
		));
        if (count(Classify::where('sex', $classify->sex)->where('name', $classify->name)->get()) != 1) {
            DB::rollback();

            return DefaultView::False('Classify already exists', $classify, null);
        }

        DB::commit();

        return DefaultView::True('Query successfully', $classify);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classify = Classify::find($id);

        if (is_null($classify))
            return DefaultView::False('Classify not found', null, null);

        return DefaultView::True('Query successfully', $classify);
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
        $classify = Classify::find($id);

        if (is_null($classify))
            return DefaultView::False('Classify not found', null, null);

        DB::beginTransaction();

        $classify->update(array_merge(
            $request->valid->validated()
        ));
        if (count(Classify::where('sex', $classify->sex)->where('name', $classify->name)->get()) != 1) {
            DB::rollback();

            return DefaultView::False('Classify already exists', $classify, null);
        }

        DB::commit();

        return DefaultView::True('Query successfully', $classify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classify = Classify::find($id);

        if (is_null($classify))
            return DefaultView::False('Classify not found', null, null);

        $classify->delete();

        return DefaultView::True('Query successfully', $classify);
    }
}
