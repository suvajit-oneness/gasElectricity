<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierPincodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_pincodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('userId');
            $table->bigInteger('stateId');
            $table->string('pincode',10)->index();
            $table->string('landmark');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        $data = [];$states = DB::table('states')->where('countryId',2)->get();
        foreach ($states as $key => $state) {
            for ($i=0; $i < 5; $i++) {
                $data[] = [
                    'userId' => 2,
                    'stateId' => $state->id,
                    'pincode' => rand(1111,9999),
                    'landmark' => 'landmark '.($key+$i),
                ];
            }
        }
        DB::table('supplier_pincodes')->insert($data);        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_pincodes');
    }
}
