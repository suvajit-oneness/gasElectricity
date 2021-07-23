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
                'formInputId' => 2,
                'userId' => 2,
                'key' => generateKeyForForm('What type of property'),
                'label' => 'What type of property?',
                'placeholder' => '',
            ],
            [
                'formInputId' => 2,
                'userId' => 2,
                'key' => generateKeyForForm('Do you own or rent the property'),
                'label' => 'Do you own or rent the property?',
                'placeholder' => '',
            ],
            [
                'formInputId' => 2,
                'userId' => 2,
                'key' => generateKeyForForm('Are you moving into this property'),
                'label' => 'Are you moving into this property?',
                'placeholder' => '',
            ],
            [
                'formInputId' => 2,
                'userId' => 2,
                'key' => generateKeyForForm('Do you also need to connect a broadband or home entertainment service'),
                'label' => 'Do you also need to connect a broadband or home entertainment service?',
                'placeholder' => '',
            ],
            [
                'formInputId' => 2,
                'userId' => 2,
                'key' => generateKeyForForm('Do you have gas connection to the property'),
                'label' => 'Do you have gas connection to the property?',
                'placeholder' => '',
            ],
            [
                'formInputId' => 2,
                'userId' => 2,
                'key' => generateKeyForForm('What level best describes your typical electricity usage'),
                'label' => 'What level best describes your typical electricity usage?',
                'placeholder' => '',
            ],
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
