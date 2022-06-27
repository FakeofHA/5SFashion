<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Segment;
use App\Models\Views\DefaultView;

class SegmentController extends Controller
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
        return DefaultView::True('Query successfully', Segment::all());
    }
}
