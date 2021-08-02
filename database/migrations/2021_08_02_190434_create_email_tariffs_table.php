<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailTariffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_tariffs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('companyId');
            $table->tinyInteger('type')->comment('1: Electricty,2:Gas')->default(1);
            $table->string('title');
            $table->longText('link');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        $company = \App\Model\Company::get();
        foreach ($company as $key => $value)
        {
            $data = [];
            $data[] = [
                'companyId' => $value->id,
                'type' => 1,
                'title' => 'Single rate tariff (EA010)',
                'link' => 'https://www.google.co.in',
            ];
            $data[] = [
                'companyId' => $value->id,
                'type' => 1,
                'title' => 'Single Rate With Controlled Load 2 Tariff (EA010|EA040)',
                'link' => 'https://www.google.co.in',
            ];
            $data[] = [
                'companyId' => $value->id,
                'type' => 1,
                'title' => 'Time Of Use Tariff (EA025)',
                'link' => 'https://www.google.co.in',
            ];
            $data[] = [
                'companyId' => $value->id,
                'type' => 1,
                'title' => 'Time Of Use Tariff (EA025)',
                'link' => 'https://www.google.co.in',
            ];
            $data[] = [
                'companyId' => $value->id,
                'type' => 1,
                'title' => 'Time Of Use With Controlled Load 2 Tariff (EA025|EA040)',
                'link' => 'https://www.google.co.in',
            ];
            $data[] = [
                'companyId' => $value->id,
                'type' => 1,
                'title' => 'Demand Two Rate Tariff (EA115)',
                'link' => 'https://www.google.co.in',
            ];
            $data[] = [
                'companyId' => $value->id,
                'type' => 1,
                'title' => 'Demand Two Rate With Controlled Load 2 Tariff (EA115|EA040)',
                'link' => 'https://www.google.co.in',
            ];
            $data[] = [
                'companyId' => $value->id,
                'type' => 1,
                'title' => 'Demand Single Rate Intro Tariff (EA111)',
                'link' => 'https://www.google.co.in',
            ];
            $data[] = [
                'companyId' => $value->id,
                'type' => 1,
                'title' => 'Demand Single Rate Tariff (EA116)',
                'link' => 'https://www.google.co.in',
            ];
            $data[] = [
                'companyId' => $value->id,
                'type' => 1,
                'title' => 'Single Rate With Controlled Load 1 Tariff (EA010|EA030)',
                'link' => 'https://www.google.co.in',
            ];
            $data[] = [
                'companyId' => $value->id,
                'type' => 2,
                'title' => 'gas peak offpeak',
                'link' => 'https://www.energymadeeasy.gov.au/plan?id=ALI13114MRG&utm_source=Alinta%20Energy&utm_campaign=bpi-retailer&utm_medium=retailer"><a href="https://www.energymadeeasy.gov.au/plan?id=ALI13114MRG&utm_source=Alinta%20Energy&utm_campaign=bpi-retailer&utm_medium=retailer',
            ];
            DB::table('email_tariffs')->insert($data);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_tariffs');
    }
}
