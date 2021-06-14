<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class QuotationForm extends Model
{
    public function supplierFormData()
    {
        return $this->hasOne('App\Model\SupplierForm', 'quotationFormId', 'id')->where('supplier_forms.created_by', auth()->user()->id);
    }
}
