<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierFormOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_form_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('supplierFormId');
            $table->string('option');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        $data = [
            [
                'supplierFormId' => 1,
                'option' => 'My Home',
            ],
            [
                'supplierFormId' => 1,
                'option' => 'My Business',
            ],
            [
                'supplierFormId' => 2,
                'option' => 'Own',
            ],
            [
                'supplierFormId' => 2,
                'option' => 'Rent',
            ],
            [
                'supplierFormId' => 3,
                'option' => 'Yes',
            ],
            [
                'supplierFormId' => 3,
                'option' => 'No',
            ],
            [
                'supplierFormId' => 4,
                'option' => 'Yes',
            ],
            [
                'supplierFormId' => 4,
                'option' => 'No',
            ],
            [
                'supplierFormId' => 5,
                'option' => 'Yes',
            ],
            [
                'supplierFormId' => 5,
                'option' => 'No',
            ],
            [
                'supplierFormId' => 5,
                'option' => "Don`t Know",
            ],
            [
                'supplierFormId' => 6,
                'option' => 'Low',
            ],
            [
                'supplierFormId' => 6,
                'option' => 'Medium',
            ],
            [
                'supplierFormId' => 6,
                'option' => "High",
            ],
        ];

        DB::table('supplier_form_options')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_form_options');
    }
}
