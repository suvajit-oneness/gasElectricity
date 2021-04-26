<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddgenderDobAnniversaryMaritalToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('gender',20)->after('referred_by')->comment('Male,Female,Not specified');
            $table->date('dob')->after('gender');
            $table->string('marital',20)->after('dob')->comment('Single,Married,Divorced');
            $table->date('aniversary')->after('marital');
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
            $table->dropColumn(['gender', 'dob', 'marital','aniversary']);
        });
    }
}
