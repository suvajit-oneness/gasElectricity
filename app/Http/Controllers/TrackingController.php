<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\TrackingPixel;

class TrackingController extends Controller
{
    public function index(Request $request)
    {
        switch($request->buttonId) {
            case 'uploadElectricityOrGasBill': $desc = 'user clicked on upload electricity or gas bill button to upload energy usage manually';break;
            case 'leavingStage1': $desc = 'user clicked on next button to goto stage 2';break;
            case 'loginToSeeDetails': $desc = 'user clicked on login button to see detailed information to see list of information about plans';break;
            case 'selectPlanToSeeDetails': $desc = 'user clicked on plan details button to see detailed information about plans';$stage = 2;break;
            case 'backtoPlanDetails': $desc = 'user clicked on back to plan details button to see list of information about plans';$stage = 2;break;
            case 'emailPlan': $desc = 'user clicked on Email plan details button to receive email about plan details';$stage = 3;break;
            case 'switchAndSaveToday': $desc = 'user clicked on switch and save today button to see list of information about plans';$stage = 3;break;
            case 'finalStageUserDetails': $desc = 'user entered their details and completed final form submission';$stage = 4;break;
            default: $desc = null; $stage = 1;break;
        }

        $rand = time() . mt_rand();
        $track = new TrackingPixel();
        $track->ip = $_SERVER['REMOTE_ADDR'];
        $track->user_id = Auth()->user() ? Auth()->user()->id : '0';
        $track->page = $request->page;
        // $track->x_axis = $request->xAxis;
        // $track->y_axis = $request->yAxis;
        $track->button_id = $request->buttonId;
        $track->stage = $stage;
        $track->desc = $desc;
        $track->save();
    }
}