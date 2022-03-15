<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertDataInSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $data = [
            [
                'key' => 'individualutility',
                'heading' => 'Here’s Everything You Need To Know',
                'title' => 'Energy Comparison',
                'description' => "Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.",
                'image' => 'https://cdn.econnex.com.au/wp-content/uploads/2017/10/about-grl-image.jpg',
            ],
            [
                'key' => 'individualutility',
                'heading' => 'Here’s Everything You Need To Know',
                'title' => 'How do I choose energy plans',
                'description' => "Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.",
                'image' => 'https://cdn.econnex.com.au/wp-content/uploads/2013/05/bulb.png',
            ],
            [
                'key' => 'individualutility',
                'heading' => 'Here’s Everything You Need To Know',
                'title' => 'Best electricity plans',
                'description' => "Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat
                Nec sagittis sem nibh id elit. Duis sed odio
                Sit amet nibh vulputate
                Sollicitudin, lorem quis bibendum
                Nec sagittis sem nibh id elit. Duis sed odio",
                'image' => 'https://cdn.econnex.com.au/wp-content/uploads/2013/05/bulb.png',
            ]


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
        Schema::table('settinfs', function (Blueprint $table) {
            //
        });
    }
}