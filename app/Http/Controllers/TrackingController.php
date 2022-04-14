<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\TrackingPixel;

class TrackingController extends Controller
{
    public function index(Request $request)
    {
        $rand = time() . mt_rand();
        $track = new TrackingPixel();
        $track->ip = $_SERVER['REMOTE_ADDR'];
        $track->user_id = Auth()->user() ? Auth()->user()->id : '0';
        $track->page = $request->page;
        $track->x_axis = $request->xAxis;
        $track->y_axis = $request->yAxis;
        $track->save();
    }
}