<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyPlanDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_plan_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('companyId');
            $table->tinyInteger('type')->comment('1: Bonuses and Fees, 2: Other Details')->default(1);
            $table->string('title',100);
            $table->longText('description');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        $data = [];
        $company = DB::table('companies')->get();
        foreach ($company as $key => $value) {
            $data[] = [
                'companyId' => $value->id,
                'type' => 1,
                'title' => 'Bonus',
                'description' => '',
            ];
            $data[] = [
                'companyId' => $value->id,
                'type' => 1,
                'title' => 'Contract length',
                'description' => 'Ongoing Market contract',
            ];
            $data[] = [
                'companyId' => $value->id,
                'type' => 1,
                'title' => 'Benefit Period',
                'description' => 'Minimum of 12 Month',
            ];
            $data[] = [
                'companyId' => $value->id,
                'type' => 1,
                'title' => 'Payment Processing Fee',
                'description' => '0.78% for credit card payment & 0.32% for debit cart payments made by Mastercart or Visa',
            ];
            $data[] = [
                'companyId' => $value->id,
                'type' => 1,
                'title' => 'Over the counter payment fee',
                'description' => 'Nil',
            ];
            $data[] = [
                'companyId' => $value->id,
                'type' => 1,
                'title' => 'Paper Bill Fee',
                'description' => 'No fee for paper bills',
            ];
            $data[] = [
                'companyId' => $value->id,
                'type' => 1,
                'title' => 'Colling Off Period',
                'description' => '10 Business day',
            ];
            $data[] = [
                'companyId' => $value->id,
                'type' => 1,
                'title' => 'Other fee Section',
                'description' => 'Dishonour fee $7.50 (exec. GST) if your payment is dishonour or reversed',
            ];
            $data[] = [
                'companyId' => $value->id,
                'type' => 2,
                'title' => 'Billing Option',
                'description' => 'Flexible billing options/Monthly billing available',
            ];
            $data[] = [
                'companyId' => $value->id,
                'type' => 2,
                'title' => 'Payment Options',
                'description' => 'Direct Debit , Credit card & Bpay',
            ];
        }

        DB::table('company_plan_details')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_plan_details');
    }
}
