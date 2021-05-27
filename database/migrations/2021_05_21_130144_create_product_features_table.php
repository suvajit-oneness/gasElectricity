<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_features', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id');
            $table->string('title', 300);
            $table->longText('description');
            $table->bigInteger('created_by')->comment('UserId');
            $table->bigInteger('updated_by')->comment('UserId');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        $feature = [];
        for ($i=0; $i < 8; $i++) { 
            $feature[] = ['product_id' => $i+1,'title' => 'Sign Up & get up to 10K Everyday Rewards Points','description' => ''];
            $feature[] = ['product_id' => $i+1,'title' => '1 point for every $1 charged on your bill (T&Cs)','description' => ''];
            $feature[] = ['product_id' => $i+1,'title' => 'Includes 25% GreenPower','description' => ''];
            $feature[] = ['product_id' => $i+1,'title' => '5,000 Everyday Rewards points + 1 point for every $1 billed.','description' => ''];
        }
        DB::table('product_features')->insert($feature);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_features');
    }
}
