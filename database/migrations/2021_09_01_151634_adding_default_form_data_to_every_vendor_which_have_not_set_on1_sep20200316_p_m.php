<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingDefaultFormDataToEveryVendorWhichHaveNotSetOn1Sep20200316PM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $vendors = \App\User::where('user_type',2)->get();
        foreach ($vendors as $key => $vendor) {
            $supplierForm = \App\Model\SupplierForm::where('userId',$vendor->id)->first();
            if(!$supplierForm){
                $data = [
                    [
                        'formInputId' => 1,
                        'userId' => $vendors->id,
                        'key' => 'name',
                        'label' => 'Full Name',
                        'placeholder' => 'Full Name',
                    ],
                    [
                        'formInputId' => 1,
                        'userId' => $vendors->id,
                        'key' => 'mobile',
                        'label' => 'Mobile',
                        'placeholder' => 'Mobile Number',
                    ],
                    [
                        'formInputId' => 7,
                        'userId' => $vendors->id,
                        'key' => 'address',
                        'label' => 'Communication Address',
                        'placeholder' => 'Communication Address',
                    ]
                ];
                DB::table('supplier_forms')->insert($data);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
