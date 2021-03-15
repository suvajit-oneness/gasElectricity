<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('heading');
            $table->string('title');
            $table->longText('description');
            $table->string('image');
            $table->string('whychooseus')->comment('heading of Why Choose Us');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        $data = [
            [
                'heading' => 'About Us',
                'title' => 'Compare, Switch and Save today with Econnex',
                'description' => "<p><strong>We believe all consumers deserve to know that there is a better energy deal available to them. And they should be able to access that deal quickly and easily so they can begin saving on their energy bills right away.</strong></p>
                    <p>At Econnex we are affiliated with the best&nbsp;<a href='https://www.econnex.com.au/approved-providers-list/'>energy retailers</a>&nbsp;in the Australian market, making it easy for consumers to compare energy prices and access the best deals. We bring you only the best electricity and gas deals while cutting through the marketing spin. Our sophisticated engine compares all the options quickly and presents you with the very best plans available, ensuring that you are immediately saving on your next bill.</p>
                    <p>Learn how&nbsp;<a href='https://www.youtube.com/watch?v=U5LtsX6K6Sw'>energy comparison works</a>&nbsp;with Econnex.</p>",
                'image' => 'https://cdn.econnex.com.au/wp-content/uploads/2017/10/about-grl-image.jpg',
                'whychooseus' => 'WHY CHOOSE US'
            ],
        ];

        DB::table('about_us')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_us');
    }
}
