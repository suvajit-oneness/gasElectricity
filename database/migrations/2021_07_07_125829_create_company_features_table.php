<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_features', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('companyId');
            $table->string('title', 300);
            $table->longText('description');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        $feature = [];
        $company = DB::table('companies')->get();
        foreach ($company as $key => $value) {
            $feature[] = ['companyId' => $value->id,'title' => 'Sign Up & get up to 10K Everyday Rewards Points','description' => 'Momentum Energy has ditched discounting in favour of delivering simple rates you can easily understand. With zero cheeky conditions and zero catches, it’s transparent and simple.'];
            $feature[] = ['companyId' => $value->id,'title' => '1 point for every $1 charged on your bill (T&Cs)','description' => 'Momentum Energy has ditched discounting in favour of delivering simple rates you can easily understand. With zero cheeky conditions and zero catches, it’s transparent and simple.'];
            $feature[] = ['companyId' => $value->id,'title' => 'Includes 25% GreenPower','description' => 'Momentum Energy has ditched discounting in favour of delivering simple rates you can easily understand. With zero cheeky conditions and zero catches, it’s transparent and simple.'];
            $feature[] = ['companyId' => $value->id,'title' => '5,000 Everyday Rewards points + 1 point for every $1 billed.','description' => 'Momentum Energy has ditched discounting in favour of delivering simple rates you can easily understand. With zero cheeky conditions and zero catches, it’s transparent and simple.'];
        }
        DB::table('company_features')->insert($feature);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_features');
    }
}
