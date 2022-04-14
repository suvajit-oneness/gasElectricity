<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToTrackingPixelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tracking_pixels', function (Blueprint $table) {
            $table->tinyInteger('stage')->comment('stage 1, 2, 3, 4')->default(1)->after('id');
            $table->text('desc')->nullable()->after('y_axis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tracking_pixels', function (Blueprint $table) {
            $table->dropColumn('stage');
            $table->dropColumn('stage_desc');
        });
    }
}
