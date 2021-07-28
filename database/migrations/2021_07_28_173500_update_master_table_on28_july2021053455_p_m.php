<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMasterTableOn28July2021053455PM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('masters', function (Blueprint $table) {
            $table->float('onepoint_equals',8,2)->after('otp')->comment('One Point is Equal to Doller &');
            $table->float('referral_bonus',8,2)->after('onepoint_equals')->comment('This point will be deliver to user Account when user Referred anyone');
            $table->float('joining_bonus',8,2)->after('referral_bonus')->comment('This Point will be Deliver to user Account when new user Joined');
        });

        $data = [
            'onepoint_equals' => 1,
            'referral_bonus' => 20,
            'joining_bonus' => 10,
        ];

        $master = DB::table('masters')->where('id',1)->update($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
