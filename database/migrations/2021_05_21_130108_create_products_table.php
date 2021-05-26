<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('company_id');
            $table->string('name');
            $table->string('tag');
            $table->longText('tag_description');
            $table->bigInteger('created_by');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        $product = [
            ['company_id' => 1,'name' => 'Everyday Rewards','tag' => 'Basic Plan Information','tag_description' => '','created_by' => 1],
            ['company_id' => 1,'name' => 'Reamped Advance','tag' => 'Basic Plan Information','tag_description' => '','created_by' => 1],
            ['company_id' => 1,'name' => 'Everyday Rewards','tag' => 'Basic Plan Information','tag_description' => '','created_by' => 1],
            ['company_id' => 2,'name' => 'Everyday Rewards','tag' => 'Basic Plan Information','tag_description' => '','created_by' => 1],
            ['company_id' => 2,'name' => 'Reamped Advance','tag' => 'Basic Plan Information','tag_description' => '','created_by' => 1],
            ['company_id' => 2,'name' => 'Everyday Rewards','tag' => 'Basic Plan Information','tag_description' => '','created_by' => 1],
            ['company_id' => 3,'name' => 'Everyday Rewards','tag' => 'Basic Plan Information','tag_description' => '','created_by' => 1],
            ['company_id' => 3,'name' => 'Reamped Advance','tag' => 'Basic Plan Information','tag_description' => '','created_by' => 1],
        ];
        DB::table('products')->insert($product);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
