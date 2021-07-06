<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_inputs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('input_type');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        $data = [
            ['input_type' => 'text'],
            ['input_type' => 'radio'],
            ['input_type' => 'checkbox'],
            ['input_type' => 'email'],
            ['input_type' => 'url'],
            ['input_type' => 'file'],
            ['input_type' => 'textarea'],
        ];
        DB::table('form_inputs')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_inputs');
    }
}
