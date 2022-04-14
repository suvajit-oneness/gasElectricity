<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTrackingPixelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracking_pixels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->comment('visitor or user')->default('0');
            $table->bigInteger('seller_id')->default('0');
            $table->string('ip');
            $table->longText('page');
            $table->timestamp('time')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('utm')->nullable();
            $table->string('button_id')->nullable();
            $table->string('x_axis')->nullable();
            $table->string('y_axis')->nullable();
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
        Schema::dropIfExists('tracking_pixels');
    }
}