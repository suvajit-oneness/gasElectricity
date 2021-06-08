<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_discounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('productId');
            $table->string('title');
            $table->string('description');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        $discount = [];
        for ($i=0; $i < 8; $i++) { 
            $discount[] = ['productId' => $i+1,'title' => 'Contract Exit Fee','description' => 'No Exit Fees.'];
            $discount[] = ['productId' => $i+1,'title' => 'Dishonoured Payment Fee','description' => 'Nil.'];
            $discount[] = ['productId' => $i+1,'title' => 'Card Payment Fee','description' => 'No Credit Card Fees.'];
        }
        DB::table('product_discounts')->insert($discount);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_discouts');
    }
}
