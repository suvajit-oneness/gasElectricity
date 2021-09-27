<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnintoSwitcherUsertable27Sept2021 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('requireLifeSupportMedicalEquipment',20)->after('aniversary');
            $table->string('operateLifeSupportMedicalEquipment',20)->after('aniversary');
            $table->string('LifeSupportMachineType',200)->after('operateLifeSupportMedicalEquipment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['requireLifeSupportMedicalEquipment','operateLifeSupportMedicalEquipment','LifeSupportMachineType']);
        });
    }
}
