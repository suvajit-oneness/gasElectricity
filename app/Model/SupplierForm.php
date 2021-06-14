<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupplierForm extends Model
{
    use SoftDeletes;

    public static function insertDataForSupplier($supplierId)
    {
        $form = \App\Model\QuotationForm::get();
        foreach($form as $checkForm){
            $check = SupplierForm::where('created_by',$supplierId)->where('quotationFormId',$checkForm->id)->first();
            if(!$check){
                $new = new SupplierForm();
                $new->created_by = $supplierId;
                $new->quotationFormId = $checkForm->id;
                $new->is_required = 1;
                $new->status = 1;
                $new->save();
            }
        }
    }

    
}
