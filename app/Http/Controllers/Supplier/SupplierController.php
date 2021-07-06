<?php

namespace App\Http\Controllers\Supplier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller,App\Model\SupplierPincode;
use  App\Model\SupplierForm;use  App\Model\QuotationForm;
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
        SupplierForm::insertDataForSupplier(auth()->user()->id);
        $forms = QuotationForm::with('supplierFormData')->get();
        return view('supplier.setting.form',compact('forms'));
    }

    public function updateSupplierForm(Request $req)
    {
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
}
