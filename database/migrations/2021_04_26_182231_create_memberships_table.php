<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('description');
            $table->float('price',8,2);
            $table->integer('duration')->comment('valid for how many years Year')->default(1);
            $table->tinyInteger('is_active')->comment('1:Active,0:In-Active')->default(1);
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        $data = [
            [
                'title' => 'Silver',
                'description' => 'Silver Membership Plan',
                'price' => 299,
            ],
            [
                'title' => 'Gold',
                'description' => 'Gold Membership Plan',
                'price' => 499,
            ],
            [
                'title' => 'Platinum',
                'description' => 'Platinum Membership Plan',
                'price' => 699,
            ],
        ];
        DB::table('memberships')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memberships');
    }
}
