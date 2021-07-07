<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyRateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_rate_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('companyId');
            $table->tinyInteger('type')->comment('1: Single Rate, 2: Single + Controlled Load, 3: Time of Use')->default(1);
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
                'title' => 'Network Area',
                'description' => 'Ausgrid',
            ];
            $data[] = [
                'companyId' => $value->id,
                'type' => 1,
                'title' => 'Connection fee',
                'description' => '$45 incl. GST(Applicable when Move-In)',
            ];
            $data[] = [
                'companyId' => $value->id,
                'type' => 1,
                'title' => 'Disconnection fee',
                'description' => '$176.29 incl. GST(Applicable when Move-Out)',
            ];
            $data[] = [
                'companyId' => $value->id,
                'type' => 1,
                'title' => 'Exit fee',
                'description' => 'No exit fee',
            ];
            $data[] = [
                'companyId' => $value->id,
                'type' => 1,
                'title' => 'Effective From',
                'description' => date('Y-m-d'),
            ];
            $data[] = [
                'companyId' => $value->id,
                'type' => 1,
                'title' => 'Tariff Description',
                'description' => 'Small Business single rate',
            ];
            $data[] = [
                'companyId' => $value->id,
                'type' => 1,
                'title' => 'Basic plan information document',
                'description' => '<a href="https://www.google.com/" target="_blank">Click here for basic plan information</a>',
            ];
            $data[] = [
                'companyId' => $value->id,
                'type' => 1,
                'title' => 'Daily Supply Charge',
                'description' => '155 cent per day',
            ];
            $data[] = [
                'companyId' => $value->id,
                'type' => 1,
                'title' => 'Peak usage for all times',
                'description' => '24 cent per kwh',
            ];
        }
        DB::table('company_rate_details')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_rate_details');
    }
}
