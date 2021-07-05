<?php

namespace App\Http\Controllers\Supplier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\Model\SupplierForm;use  App\Model\QuotationForm;
class SupplierController extends Controller
{
    public function supplierServicePincode(Request $req)
    {
        return view('supplier.service.pincode');
    }

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
}
