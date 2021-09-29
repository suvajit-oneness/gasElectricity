<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Rfq;

class CustomerController extends Controller
{
    public function dashboard(Request $req)
    {
        $data = (object)[];
        $data->rfqs = Rfq::where('userId',auth()->user()->id)->latest()->paginate(5);
        return view('customer.dashboard',compact('data'));
    }

    /*public function rfqEnquiry(Request $req)
    {
        $rfqs = Rfq::where('userId',auth()->user()->id)->latest()->get();
        return view('customer.enquiry.rfqReport',compact('rfqs'));
    }*/


}
