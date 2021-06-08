<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddsomenewrowintoSettingTableon08June2021 extends Migration
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
                'key' => 'wecomparealloftheseenegysupplier',
                'heading' => 'WE COMPARE ALL OF THESE ENERGY SUPPLIERS',
                'title' => '',
                'description' => "",
                'image' => 'forntEnd/images/dodo.png',
            ],
            [
                'key' => 'wecomparealloftheseenegysupplier',
                'heading' => 'WE COMPARE ALL OF THESE ENERGY SUPPLIERS',
                'title' => '',
                'description' => "",
                'image' => 'forntEnd/images/tango.png',
            ],
            [
                'key' => 'wecomparealloftheseenegysupplier',
                'heading' => 'WE COMPARE ALL OF THESE ENERGY SUPPLIERS',
                'title' => '',
                'description' => "",
                'image' => 'forntEnd/images/simplyenergy.png',
            ],
            [
                'key' => 'wecomparealloftheseenegysupplier',
                'heading' => 'WE COMPARE ALL OF THESE ENERGY SUPPLIERS',
                'title' => '',
                'description' => "",
                'image' => 'forntEnd/images/simplyenergy.png',
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
        //
    }
}
