<?php

namespace App\Http\Controllers\Supplier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\State;use App\Model\Country;

class SupplierController extends Controller
{
    public function states(Request $req)
    {
        $state = State::where('countryId',2)->with('country')->get();
        // dd($state);
        return view('supplier.state',compact('state'));
    }

    public function addOrUpdateState(Request $req)
    {
        $req->validate([
            'form_type' => 'required|in:add,edit',
        ]);
        if($req->form_type == 'add'){
            $req->validate([
                'country' => 'required|numeric|min:1',
                'state' => 'required|string|max:200',
            ]);
            $checkState = State::where('countryId',$req->country)->where('name',$req->state)->first();
            if(!$checkState){
                $state = new State();
                    $state->countryId = $req->country;
                    $state->name = $req->state;
                $state->save();
                return back()->with('Success','State Added SuccessFully');
            }
            $error['state'] = 'This State is Already Exists';
            return back()->withErrors($error)->withInput($req->all());
        }else{
            $req->validate([
                'stateId' => 'required|numeric|min:1',
                'country' => 'required|numeric|min:1',
                'state' => 'required|string|max:200',
            ]);
            $checkState = State::where('id','!=',$req->stateId)->where('countryId',$req->country)->where('name',$req->state)->first();
            if(!$checkState){
                $state = State::where('id',$req->stateId)->first();
                    $state->countryId = $req->country;
                    $state->name = $req->state;
                $state->save();
                return back()->with('Success','State Updated SuccessFully');
            }
            $error['state'] = 'This State is Already Exists';
            return back()->withErrors($error)->withInput($req->all());
        }
    }

    public function deleteState(Request $req)
    {
        $rules = [
            'stateId' => 'required|numeric|min:1',
        ];
        $validator = validator()->make($req->all(),$rules);
        if(!$validator->fails()){
            $state = State::find($req->stateId);
            if($state){
                $state->delete();
                return successResponse('State Deleted Success'); 
            }
            return errorResponse('Invalid State Id');
        }
        return errorResponse($validator->errors()->first());
    }
}
