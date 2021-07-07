<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('about_us');Schema::dropIfExists('how_it_works');
        Schema::dropIfExists('why_choose_us');
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key');
            $table->index(['key']);
            $table->string('heading');
            $table->string('title');
            $table->longText('description');
            $table->string('image');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        $data = [
            [
                'key' => 'about_us',
                'heading' => 'About Us',
                'title' => 'Compare, Switch and Save today with Econnex',
                'description' => "<p><strong>We believe all consumers deserve to know that there is a better energy deal available to them. And they should be able to access that deal quickly and easily so they can begin saving on their energy bills right away.</strong></p>
                    <p>At Econnex we are affiliated with the best&nbsp;<a href='https://www.econnex.com.au/approved-providers-list/'>energy retailers</a>&nbsp;in the Australian market, making it easy for consumers to compare energy prices and access the best deals. We bring you only the best electricity and gas deals while cutting through the marketing spin. Our sophisticated engine compares all the options quickly and presents you with the very best plans available, ensuring that you are immediately saving on your next bill.</p>
                    <p>Learn how&nbsp;<a href='https://www.youtube.com/watch?v=U5LtsX6K6Sw'>energy comparison works</a>&nbsp;with Econnex.</p>",
                'image' => 'https://cdn.econnex.com.au/wp-content/uploads/2017/10/about-grl-image.jpg',
            ],
            [
                'key' => 'whychooseus',
                'heading' => 'WHY CHOOSE US',
                'title' => 'Innovative System',
                'description' => "Econnex is an innovative system helping you and thousands of Aussies compare energy plans across Australia.",
                'image' => 'https://cdn.econnex.com.au/wp-content/uploads/2013/05/bulb.png',
            ],
            [
                'key' => 'whychooseus',
                'heading' => 'WHY CHOOSE US',
                'title' => 'Latest Technology',
                'description' => "We use the latest technology to search and compare electricity and gas plans from our panel of leading retailers.",
                'image' => 'https://cdn.econnex.com.au/wp-content/uploads/2013/05/technology.png',
            ],
            [
                'key' => 'whychooseus',
                'heading' => 'WHY CHOOSE US',
                'title' => 'Free Service',
                'description' => "We don’t charge you anything to use our service and we won’t call or try to steer you into something you don’t need.",
                'image' => 'https://cdn.econnex.com.au/wp-content/uploads/2013/05/mobile.png',
            ],
            [
                'key' => 'whychooseus',
                'heading' => 'WHY CHOOSE US',
                'title' => 'Be Energy Smart',
                'description' => "Econnex filters through available energy prices and deals so you can make an informed decision of your Energy needs.",
                'image' => 'https://cdn.econnex.com.au/wp-content/uploads/2013/05/energy.png',
            ],
            ['key' => 'how_it_works','heading' => 'HOW IT WORKS','title' => 'Provide details and scan your bill','description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets.",'image' => 'forntEnd/images/payment.png'],
            ['key' => 'how_it_works','heading' => 'HOW IT WORKS','title' => 'Our algorithms work out the comparisons for you','description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets.",'image' => 'forntEnd/images/illustration-weighing-scale.png'],
            ['key' => 'how_it_works','heading' => 'HOW IT WORKS','title' => 'We present you with your best prices','description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets.",'image' => 'forntEnd/images/best-price.png'],
            ['key' => 'how_it_works','heading' => 'HOW IT WORKS','title' => 'You save','description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets.",'image' => 'forntEnd/images/savings.png'],
            [
                'key' => 'wecomparealloftheseenegysupplier','heading' => 'WE COMPARE ALL OF THESE ENERGY SUPPLIERS','title' => '','description' => "",'image' => 'forntEnd/images/dodo.png',
            ],
            [
                'key' => 'wecomparealloftheseenegysupplier','heading' => 'WE COMPARE ALL OF THESE ENERGY SUPPLIERS','title' => '','description' => "",'image' => 'forntEnd/images/tango.png',
            ],
            [
                'key' => 'wecomparealloftheseenegysupplier','heading' => 'WE COMPARE ALL OF THESE ENERGY SUPPLIERS','title' => '','description' => "",'image' => 'forntEnd/images/simplyenergy.png',
            ],
            [
                'key' => 'whatweprovide',
                'heading' => 'WHAT WE PROVIDE',
                'title' => 'Panel of Providers',
                'description' => "Compare Energy Prices, Rates & Tariffs across our panel of TOP retailers – EnergyAustralia, AGL, Origin Energy, Alinta Energy, Powershop and much more.",
                'image' => 'forntEnd/images/pro-icon-1.png',
            ],
            [
                'key' => 'whatweprovide',
                'heading' => 'WHAT WE PROVIDE',
                'title' => 'FREE Energy Comparison',
                'description' => "There is no obligation to sign up, our electricity and gas comparison service is 100% free to use!",
                'image' => 'forntEnd/images/pro-icon-2.png',
            ],
            [
                'key' => 'whatweprovide',
                'heading' => 'WHAT WE PROVIDE',
                'title' => 'Find the Right One',
                'description' => "Choose competitive Energy Rates and Plans to make an informed choice. Take advantage of a better energy plan.",
                'image' => 'forntEnd/images/pro-icon-3.png',
            ],
        ];
        DB::table('settings')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
