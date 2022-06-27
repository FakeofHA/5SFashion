<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;
use App\Models\Views\DefaultView;
use Illuminate\Support\Facades\DB;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DefaultView::True('Query successfully', Size::all());
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

        $size = Size::create(array_merge(
			$request->valid->validated()
		));
        if (count(Size::where('name', $size->name)->get()) != 1) {
            DB::rollback();

            return DefaultView::False('Classify already exists', $size, null);
        }

        DB::commit();

        return DefaultView::True('Query successfully', $size);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $size = Size::find($id);

        if (is_null($size))
            return DefaultView::False('Size not found', null, null);

        return DefaultView::True('Query successfully', $size);
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
        $size = Size::find($id);

        if (is_null($size))
            return DefaultView::False('Size not found', null, null);

        DB::beginTransaction();

        $size->update(array_merge(
            $request->valid->validated()
        ));
        if (count(Size::where('name', $size->name)->get()) != 1) {
            DB::rollback();

            return DefaultView::False('Size already exists', $size, null);
        }

        DB::commit();

        return DefaultView::True('Query successfully', $size);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $size = Size::find($id);

        if (is_null($size))
            return DefaultView::False('Size not found', null, null);

        $size->delete();

        return DefaultView::True('Query successfully', $size);
    }
}
