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
            ['name' => 'Company A', 'description' => 'Company A Description', 'logo'=>'forntEnd/images/logo.png','created_by' => 1],
            ['name' => 'Company B', 'description' => 'Company B Description', 'logo'=>'forntEnd/images/logo.png','created_by' => 1],
            ['name' => 'Company C', 'description' => 'Company C Description', 'logo'=>'forntEnd/images/logo.png','created_by' => 1],
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
