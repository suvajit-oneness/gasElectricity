<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcrDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocr_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('full_text');
            $table->string('state');
            $table->string('pincode');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('unit_consumed');
            $table->string('bill_amount');
            $table->bigInteger('userId');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ocr_data');
    }
}
