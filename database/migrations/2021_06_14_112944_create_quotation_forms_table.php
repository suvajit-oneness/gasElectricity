<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('supplier_forms');
        Schema::create('quotation_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('form_label',150);
            $table->string('form_key',100);
            $table->string('form_type',20);
            $table->bigInteger('created_by')->comment('UserId');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        Schema::create('supplier_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('quotationFormId');
            $table->tinyInteger('is_required')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->bigInteger('created_by')->comment('UserId');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        $data = [
            [
                'form_label' => 'Name',
                'form_key' => 'name',
                'form_type' => 'text',
            ],
            [
                'form_label' => 'Email Address',
                'form_key' => 'email',
                'form_type' => 'email',
            ],
            [
                'form_label' => 'Phone',
                'form_key' => 'mobile',
                'form_type' => 'number',
            ],
            [
                'form_label' => 'Postcode',
                'form_key' => 'postcode',
                'form_type' => 'number',
            ],
            [
                'form_label' => 'Address',
                'form_key' => 'address',
                'form_type' => 'text',
            ],
        ];
        DB::table('quotation_forms')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotation_forms');
    }
}
