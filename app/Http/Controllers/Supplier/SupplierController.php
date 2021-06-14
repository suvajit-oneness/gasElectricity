<?php

namespace App\Http\Controllers\Supplier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\State;use App\Model\Country;
use  App\Model\SupplierForm;use  App\Model\QuotationForm;
class SupplierController extends Controller
{

    public function supplierForm(Request $req)
    {
        SupplierForm::insertDataForSupplier(auth()->user()->id);
        $forms = QuotationForm::with('supplierFormData')->get();
        return view('supplier.setting.form',compact('forms'));
    }

    public function updateSupplierForm(Request $req)
    {
        // dd($req->all());
        // $forms = SupplierForm::;
        foreach($req->formId as $key => $id){
            $SupplierForm = SupplierForm::find($id);
            $is_required = $SupplierForm->id.'_req';
            $status = $SupplierForm->id.'_status';
            $SupplierForm->is_required = $req->$is_required[0];
            $SupplierForm->status = $req->$status[0];
            $SupplierForm->save();
        }
        return back()->with('Success','Form Updated SuccessFully');
    }

    public function states(Request $req)
    {
        $state = State::where('countryId',2)->with('country')->get();
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
