<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductRateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_rate_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('productId');
            $table->tinyInteger('type')->comment('1: Single Rate, 2: Single + Controlled Load, 3: Time of Use')->default(1);
            $table->string('title',100);
            $table->longText('description');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        $data = [];
        $product = DB::table('products')->get();
        foreach ($product as $key => $pro) {
            $data[] = [
                'productId' => $pro->id,
                'type' => 1,
                'title' => 'Network Area',
                'description' => 'Ausgrid',
            ];
            $data[] = [
                'productId' => $pro->id,
                'type' => 1,
                'title' => 'Connection fee',
                'description' => '$45 incl. GST(Applicable when Move-In)',
            ];
            $data[] = [
                'productId' => $pro->id,
                'type' => 1,
                'title' => 'Disconnection fee',
                'description' => '$176.29 incl. GST(Applicable when Move-Out)',
            ];
            $data[] = [
                'productId' => $pro->id,
                'type' => 1,
                'title' => 'Exit fee',
                'description' => 'No exit fee',
            ];
            $data[] = [
                'productId' => $pro->id,
                'type' => 1,
                'title' => 'Effective From',
                'description' => date('Y-m-d'),
            ];
            $data[] = [
                'productId' => $pro->id,
                'type' => 1,
                'title' => 'Tariff Description',
                'description' => 'Small Business single rate',
            ];
            $data[] = [
                'productId' => $pro->id,
                'type' => 1,
                'title' => 'Basic plan information document',
                'description' => '<a href="https://www.google.com/" target="_blank">Click here for basic plan information</a>',
            ];
            $data[] = [
                'productId' => $pro->id,
                'type' => 1,
                'title' => 'Daily Supply Charge',
                'description' => '155 cent per day',
            ];
            $data[] = [
                'productId' => $pro->id,
                'type' => 1,
                'title' => 'Peak usage for all times',
                'description' => '24 cent per kwh',
            ];
        }
        DB::table('product_rate_details')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_rate_details');
    }
}
