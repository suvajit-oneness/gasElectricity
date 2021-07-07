<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductMomentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_momenta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('productId');
            $table->string('title');
            $table->longText('description')->comment('Optional');
            $table->string('icon');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        $momentum = [];
        $products = DB::table('products')->get();
        foreach ($products as $key => $value) {
            $momentum[] = ['productId' => $value->id,'title' => 'No confusing discounts. Just great rates.','icon' => 'forntEnd/images/gear.png'];
            $momentum[] = ['productId' => $value->id,'title' => '100% Australian owned','icon' => 'forntEnd/images/gear.png'];
            $momentum[] = ['productId' => $value->id,'title' => 'Award Winning Customer Service','icon' => 'forntEnd/images/gear.png'];
        }
        DB::table('product_momenta')->insert($momentum);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_momenta');
    }
}
