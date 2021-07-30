<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRfqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rfqs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('userId');
            $table->string('energy_type',40);
            $table->string('type_of_property',40);
            $table->string('property_type',40);
            $table->string('areyoumovingintothisproperty',40);
            $table->date('moving_date');
            $table->string('entertainment_service',40);
            $table->string('gas_connection',40);
            $table->string('electricity_usage',40);
            $table->tinyInteger('understand');
            $table->tinyInteger('termsandconsition');
            $table->bigInteger('resolved_by');
            $table->string('remarks');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rfqs');
    }
}
