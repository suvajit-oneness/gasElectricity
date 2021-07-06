<?php

namespace App\Http\Controllers\Supplier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller,App\Model\SupplierPincode;
use  App\Model\SupplierForm;use App\Model\FormInput;
use  App\Model\SupplierFormOption;
class SupplierController extends Controller
{
    public function supplierServicePincode(Request $req)
    {
        $pincode = SupplierPincode::where('userId',auth()->user()->id)->get();
        return view('supplier.service.pincode',compact('pincode'));
    }

    public function supplierServicePincodeSaveOrUpdate(Request $req)
    {
        $req->validate([
            'form_type' => 'required|in:add,edit',
            'pincode' => 'required|numeric|max:999999',
        ]);
        if($req->form_type == 'add'){
            $pincode = SupplierPincode::where('pincode',$req->pincode)->where('userId',auth()->user()->id)->first();
            if(!$pincode){
                $new = new SupplierPincode();
                $new->pincode = $req->pincode;
                $new->userId = auth()->user()->id;
                $new->save();
                return back()->with('Success','Pincode Saved SuccessFully');
            }
        }elseif($req->form_type == 'edit'){
            $req->validate([
                'pincodeId' => 'required|min:1|numeric',
            ]);
            $pincode = SupplierPincode::where('id','!=',$req->pincodeId)->where('pincode',$req->pincode)->where('userId',auth()->user()->id)->first();
            if(!$pincode){
                $update = SupplierPincode::where('id',$req->pincodeId)->where('userId',auth()->user()->id)->first();
                $update->pincode = $req->pincode;
                $update->save();
                return back()->with('Success','Pincode Updated SuccessFully');
            }
        }
        $error['pincode'] = 'PinCode Already Exists';
        return back()->withErrors($error)->withInput($req->all());
    }

    public function supplierServicePincodeDelete(Request $req)
    {
        $rules = [
            'pincodeId' => 'required|numeric|min:1',
        ];
        $validator = validator()->make($req->all(),$rules);
        if(!$validator->fails()){
            $pincode = SupplierPincode::find($req->pincodeId);
            if($pincode){
                $pincode->delete();
                return successResponse('Pincode Deleted Success'); 
            }
            return errorResponse('Invalid Pincode Id');
        }
        return errorResponse($validator->errors()->first());
    }

    public function supplierForm(Request $req)
    {
        $formInput = FormInput::get();
        $data = SupplierForm::get();
        return view('supplier.setting.form',compact('formInput','data'));
    }

    public function updateSupplierForm(Request $req)
    {
        $req->validate([
            'formInputId' => 'required|min:1|numeric|exists:form_inputs,id',
            'label' => 'required|string|max:100',
            'placeholder' => 'nullable|string|max:200',
        ]);
        $new = new SupplierForm();
            $new->formInputId = $req->formInputId;
            $new->userId = auth()->user()->id;
            $new->key = generateKeyForForm($req->label);
            $new->label = $req->label;
            $new->placeholder = emptyCheck($req->placeholder);
        $new->save();
        return back()->with('Success','Form Updated SuccessFully');
    }
}
