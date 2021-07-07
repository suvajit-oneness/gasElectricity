<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_discounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('companyId');
            $table->string('title');
            $table->string('description');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        $discount = [];
        $company = DB::table('companies')->get();
        foreach ($company as $key => $value) {
            $discount[] = ['companyId' => $value->id,'title' => 'Contract Exit Fee','description' => 'No Exit Fees.'];
            $discount[] = ['companyId' => $value->id,'title' => 'Dishonoured Payment Fee','description' => 'Nil.'];
            $discount[] = ['companyId' => $value->id,'title' => 'Card Payment Fee','description' => 'No Credit Card Fees.'];
        }
        DB::table('company_discounts')->insert($discount);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_discounts');
    }
}
