<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('formInputId');
            $table->bigInteger('userId');
            $table->string('key',100);
            $table->string('label');
            $table->string('placeholder');
            $table->tinyInteger('is_required')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        $data = [
            [
                'formInputId' => 1,
                'userId' => 2,
                'key' => 'name',
                'label' => 'Full Name',
                'placeholder' => 'Full Name',
            ],
            [
                'formInputId' => 2,
                'userId' => 2,
                'key' => 'gender',
                'label' => 'Gender',
                'placeholder' => '',
            ],
            [
                'formInputId' => 3,
                'userId' => 2,
                'key' => 'interest',
                'label' => 'Interest',
                'placeholder' => '',
            ],
            [
                'formInputId' => 4,
                'userId' => 2,
                'key' => 'email',
                'label' => 'Email Address',
                'placeholder' => 'Email Address',
            ],
            [
                'formInputId' => 7,
                'userId' => 2,
                'key' => 'Address',
                'label' => 'Communication Address',
                'placeholder' => 'Communication Address',
            ]
        ];
        DB::table('supplier_forms')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_forms');
    }
}
