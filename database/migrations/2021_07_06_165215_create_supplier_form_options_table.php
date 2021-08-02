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
                'supplierFormId' => 2,
                'option' => 'Male',
            ],
            [
                'supplierFormId' => 2,
                'option' => 'Female',
            ],
            [
                'supplierFormId' => 2,
                'option' => 'Other',
            ],
            [
                'supplierFormId' => 3,
                'option' => 'Hocky',
            ],
            [
                'supplierFormId' => 3,
                'option' => 'Football',
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
