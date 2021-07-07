<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyCalculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_calculations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('companyId');
            $table->tinyInteger('type')->comment('1: For Movers, 2: For Switchres (When usage details are provided), 3: For Switchres (When usage details are not-provided), 4: All estimates')->default(1);
            $table->longText('details');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        $data = [];
        $company = DB::table('companies')->get();
        foreach ($company as $key => $com) {
            $data[] = [
                'companyId' => $com->id,
                'type' => 1,
                'details' => 'uses electricity & gas usage benchmark data provided by ACIL/ energy industry regulators assuming that all conditions of the energy plan are satisfied',
            ];
            $data[] = [
                'companyId' => $com->id,
                'type' => 1,
                'details' => 'assumes an annual billing period for electricity and 3 months for gas',
            ];
            $data[] = [
                'companyId' => $com->id,
                'type' => 1,
                'details' => 'is based on a Single Rate tariff Only and for other rate types please provide the details from your current energy bill’ can include the ‘types i.e. Single Rate w/Control Load or TOU etc’',
            ];
            $data[] = [
                'companyId' => $com->id,
                'type' => 1,
                'details' => 'will vary based on the meter configuration selected by you',
            ];
            $data[] = [
                'companyId' => $com->id,
                'type' => 2,
                'details' => 'is based on the usage data and your selected meter type for both electricity and gas.',
            ];
            $data[] = [
                'companyId' => $com->id,
                'type' => 2,
                'details' => 'your selected billing period',
            ];
            $data[] = [
                'companyId' => $com->id,
                'type' => 2,
                'details' => 'will vary based on the meter configuration selected by you',
            ];
            $data[] = [
                'companyId' => $com->id,
                'type' => 3,
                'details' => 'uses electricity & gas usage benchmark data provided by ACIL/ energy industry regulators assuming that all conditions of the energy plan are satisfied.',
            ];
            $data[] = [
                'companyId' => $com->id,
                'type' => 3,
                'details' => 'assumes an annual billing period for electricity and 3 months for gas is based on a Single Rate tariff Only and for other rate types please provide the details from your current energy bill’ can include the ‘types i.e. Single Rate w/Control Load or TOU etc’',
            ];
            $data[] = [
                'companyId' => $com->id,
                'type' => 3,
                'details' => 'will vary based on the meter configuration selected by you',
            ];
            $data[] = [
                'companyId' => $com->id,
                'type' => 3,
                'details' => 'The accuracy of this estimate will increase if you add the details from a recent bill.',
            ];
            $data[] = [
                'companyId' => $com->id,
                'type' => 4,
                'details' => 'are inclusive of any guaranteed and conditional discounts offered in the plan',
            ];
            $data[] = [
                'companyId' => $com->id,
                'type' => 4,
                'details' => 'are inclusive of concessions, rebates and feed in tariffs (if provided by you)',
            ];
            $data[] = [
                'companyId' => $com->id,
                'type' => 4,
                'details' => 'are inclusive of GST',
            ];
            $data[] = [
                'companyId' => $com->id,
                'type' => 4,
                'details' => 'will vary depending on usage',
            ];
            $data[] = [
                'companyId' => $com->id,
                'type' => 4,
                'details' => 'are exclusive of any one off fees and charges',
            ];
        }
        DB::table('company_calculations')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_calculations');
    }
}
