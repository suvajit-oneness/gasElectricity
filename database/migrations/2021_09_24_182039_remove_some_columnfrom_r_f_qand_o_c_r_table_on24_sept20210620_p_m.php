<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveSomeColumnfromRFQandOCRTableOn24Sept20210620PM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rfqs', function (Blueprint $table) {
            // Add new Columns
            $table->longText('ocr_full_text')->after('electricity_usage');
            $table->string('ocr_state')->after('electricity_usage');
            $table->string('ocr_pincode')->after('electricity_usage');
            $table->string('ocr_unit_consumed')->after('electricity_usage');
            $table->string('ocr_bill_amount')->after('electricity_usage');
            $table->string('kwh_usage')->after('electricity_usage');
            $table->string('kwh_rate')->after('electricity_usage');
            $table->string('serviceChargedPeriod')->after('electricity_usage');
            $table->string('serviceChargedRate')->after('electricity_usage');
            // Drop Columns
            $table->dropColumn('property_type');
            $table->dropColumn('areyoumovingintothisproperty');
            $table->dropColumn('moving_date');
            $table->dropColumn('entertainment_service');
            $table->dropColumn('gas_connection');
        });

        Schema::dropIfExists('ocr_data');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
