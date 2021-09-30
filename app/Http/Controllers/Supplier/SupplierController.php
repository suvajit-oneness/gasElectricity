<?php

namespace App\Http\Controllers\Supplier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller,App\Model\SupplierPincode;
use App\Model\SupplierForm,App\Model\FormInput,App\Model\State;
use App\Model\SupplierFormOption,App\Model\UserFilledSupplierForm;
use App\Model\UserProductEnrolled,App\User;;
use App\Model\Rfq,App\Model\Product;

class SupplierController extends Controller
{
    public function reportSupplierFormFilledByUser(Request $req)
    {
        $user = $req->user();$supplier = [];
        if($user->user_type == 1){
            $supplier = User::where('user_type',2)->orderBy('name')->get();
            if(count($supplier) > 0){
                foreach ($supplier as $key => $value) {
                    if(!empty($req->supplier)){
                        $user = User::where('id',$req->supplier)->first();break;
                    }else{
                        $req->request->add(['supplier' => $value->id]);
                        $user = User::where('id',$value->id)->first();break;
                    }
                }
            }
        }
        $userEnrolled = UserProductEnrolled::select('user_product_enrolleds.*')
            ->leftjoin('products','user_product_enrolleds.productId','=','products.id')->where('products.created_by',$user->id);
        $userEnrolled = $userEnrolled->latest('user_product_enrolleds.created_at')->paginate(10);
        foreach($userEnrolled as $key => $getData){
            $getData->rfq_data = Rfq::where('id',$getData->rfqId)->first();
            $getData->product_data = Product::where('id',$getData->productId)->first();
            $getData->user_data = User::where('id',$getData->userId)->first();
            $getData->userFilledForm = UserFilledSupplierForm::where('userId',$getData->userId)->where('rfqId',$getData->rfqId)
                ->where('productId',$getData->productId)->where('supplierId',$user->id)->first();
        }
        $supplierForm = SupplierForm::where('userId',$user->id)->where('status',1)->get();
        return view('supplier.reports.userFilledForm',compact('userEnrolled','supplierForm','supplier','req'));
    }

    public function supplierServicePincode(Request $req)
    {
        $pincode = SupplierPincode::where('userId',auth()->user()->id)->orderBy('id','DESC')->get();
        $states = State::where('countryId',2)->get();
        return view('supplier.service.pincode',compact('pincode','states'));
    }

    public function supplierServicePincodeSaveOrUpdate(Request $req)
    {
        $req->validate([
            'form_type' => 'required|in:add,edit',
            'pincode' => 'required|numeric|max:999999',
            'landmark' => 'nullable|string|max:200',
            'state' => 'required|numeric|min:1',
        ]);
        if($req->form_type == 'add'){
            $pincode = SupplierPincode::where('pincode',$req->pincode)->where('userId',auth()->user()->id)->first();
            if(!$pincode){
                $new = new SupplierPincode();
                $new->stateId = $req->state;
                $new->pincode = $req->pincode;
                $new->userId = auth()->user()->id;
                $new->landmark = emptyCheck($req->landmark);
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
                $update->stateId = $req->state;
                $update->landmark = emptyCheck($req->landmark);
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
        $formInput = FormInput::where('status',1)->get();
        $data = SupplierForm::where('userId',auth()->user()->id)->get();
        return view('supplier.setting.form',compact('formInput','data'));
    }

    public function addSupplierForm(Request $req)
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

    public function formOptionRemove(Request $req)
    {
        $rules = [
            'formId' => 'required|min:1|numeric',
            'formOptionId' => 'required|min:1|numeric',
        ];
        $validator = validator()->make($req->all(),$rules);
        if(!$validator->fails()){
            $formOption = SupplierFormOption::where('id',$req->formOptionId)->where('supplierFormId',$req->formId)->first();
            if($formOption){
                $formOption->delete();
                return successResponse('option deleted Success');
            }
            return errorResponse('Invalid Form option Id or this is already removed kindly refresh the web page');
        }
        return errorResponse($validator->errors()->first());
    }

    public function updateSupplierFormStatus(Request $req)
    {
        $rules = [
            'supplierFormId' => 'required|min:1|numeric',
            'whatToDo' => 'required|in:is_required,status',
        ];
        $validator = validator()->make($req->all(),$rules);
        if(!$validator->fails()){
            $supplierForm = SupplierForm::where('id',$req->supplierFormId)->first();
            if($supplierForm){
                if($req->whatToDo == 'is_required'){
                    $supplierForm->is_required = ($supplierForm->is_required) ? 0 : 1;
                }elseif($req->whatToDo == 'status'){
                    $supplierForm->status = ($supplierForm->status) ? 0 : 1;
                }
                $supplierForm->save();
                return successResponse('Status Updated Success');
            }
            return errorResponse('Invalid Supplier Form Id');
        }
        return errorResponse($validator->errors()->first());
    }

    public function formOptionAddNew(Request $req)
    {
        $req->validate([
            'formSupplierId' => 'required|numeric|min:1',
            'option' => 'required|array',
            'option.*' => 'required|string|max:200',
        ]);
        foreach ($req->option as $key => $request) {
            $new = new SupplierFormOption();
                $new->supplierFormId = $req->formSupplierId;
                $new->option = $request;
            $new->save();
        }
        return back()->with('Success','Form Option added SuccessFully');
    }
}
