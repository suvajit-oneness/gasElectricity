<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWhyChooseUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('why_choose_us', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('aboutus_id');
            $table->string('image');
            $table->string('title');
            $table->longText('description');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        $data = [
            ['aboutus_id' => 1,'image'=>'https://cdn.econnex.com.au/wp-content/uploads/2013/05/bulb.png','title' => 'Innovative System','description' => 'Econnex is an innovative system helping you and thousands of Aussies compare energy plans across Australia.'],
            ['aboutus_id' => 1,'image'=>'https://cdn.econnex.com.au/wp-content/uploads/2013/05/technology.png','title' => 'Latest Technology','description' => 'We use the latest technology to search and compare electricity and gas plans from our panel of leading retailers.'],
            ['aboutus_id' => 1,'image'=>'https://cdn.econnex.com.au/wp-content/uploads/2013/05/mobile.png','title' => 'Free Service','description' => 'We don’t charge you anything to use our service and we won’t call or try to steer you into something you don’t need.'],
            ['aboutus_id' => 1,'image'=>'https://cdn.econnex.com.au/wp-content/uploads/2013/05/energy.png','title' => 'Be Energy Smart','description' => 'Econnex filters through available energy prices and deals so you can make an informed decision of your Energy needs.'],
        ];

        DB::table('why_choose_us')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('why_choose_us');
    }
}
