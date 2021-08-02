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
            $table->string('status')->default(1);
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        $data = [
            ['input_type' => 'text','status' => 1],
            ['input_type' => 'radio','status' => 1],
            ['input_type' => 'checkbox','status' => 1],
            ['input_type' => 'email','status' => 1],
            ['input_type' => 'url','status' => 1],
            ['input_type' => 'file','status' => 0],
            ['input_type' => 'textarea','status' => 1],
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
