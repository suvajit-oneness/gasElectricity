<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHowItWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('how_it_works', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('main_heading');
            $table->longText('title1');
            $table->longText('title2');
            $table->longText('description');
            $table->string('media');
            $table->string('review_heading');
            $table->longText('review_description');
            $table->string('review_image');
            $table->string('compare_heading');
            $table->longText('compare_description');
            $table->string('compare_image');
            $table->string('switchonspot_heading');
            $table->longText('switchonspot_description');
            $table->string('switchonspot_image');
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
        Schema::dropIfExists('how_it_works');
    }
}
