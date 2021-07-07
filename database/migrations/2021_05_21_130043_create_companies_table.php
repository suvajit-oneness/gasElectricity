<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 300);
            $table->longText('description');
            $table->string('logo', 500);
            $table->bigInteger('created_by')->comment('UserId');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        $company = [
            ['name' => 'Alinta Energy', 'description' => 'Home Deal plan - Simple, competitive rate only products', 'logo'=>'forntEnd/images/logo.png','created_by' => 2],
            ['name' => 'Alinta Energy 2', 'description' => 'Home Deal plan - Simple, competitive rate only products', 'logo'=>'forntEnd/images/logo.png','created_by' => 2],
            ['name' => 'Alinta Energy 3', 'description' => 'Home Deal plan - Simple, competitive rate only products', 'logo'=>'forntEnd/images/logo.png','created_by' => 2],
        ];
        DB::table('companies')->insert($company);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
