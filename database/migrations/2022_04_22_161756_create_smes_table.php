<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateSmesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_type_code')->nullable();
            $table->string('contact1_title')->nullable();
            $table->string('contact1_first_name')->nullable();
            $table->string('contact1_last_name')->nullable();
            $table->string('contact1_mobile_no')->nullable();
            $table->string('contact2_date_of_birth')->nullable();
            $table->string('email_address')->nullable();
            $table->string('contact1_email_address')->nullable();
            $table->string('business_name')->nullable();
            $table->string('site_street_name')->nullable();
            $table->string('site_street_type_code')->nullable();
            $table->string('site_suburb')->nullable();
            $table->string('site_state')->nullable();
            $table->string('site_post_code')->nullable();
            $table->string('site_network_code')->nullable();
            $table->string('transfer_type')->nullable();
            $table->string('site_identifier')->nullable();
            $table->string('concession_flag')->nullable();
            $table->string('conc_group_home_flag')->nullable();
            $table->string('ls_title')->nullable();
            $table->string('ls_first_name')->nullable();
            $table->string('ls_last_name')->nullable();
            $table->string('ls_address_line_2')->nullable();
            $table->string('ls_address_state')->nullable();
            $table->string('ls_address_post_code')->nullable();
            $table->string('ls_primary_phone_type_code')->nullable();
            $table->string('ls_primary_phone_prefix')->nullable();
            $table->string('ls_primary_phone_number')->nullable();
            $table->string('ls_email_address')->nullable();
            $table->string('ls_preferred_contact_method')->nullable();
            $table->string('contact1_date_of_birth')->nullable();
            $table->string('payment_method_type')->nullable();
            $table->string('green_percent')->nullable();
            $table->string('user_defined_4')->nullable();
            $table->string('promo_allowed')->nullable();
            $table->string('offering_code')->nullable();
            $table->string('bill_cycle_code')->nullable();
            $table->string('brand_code')->nullable();
            $table->string('post_addr_1')->nullable();
            $table->string('post_addr_2')->nullable();
            $table->string('post_addr_3')->nullable();
            $table->string('post_post_code')->nullable();
            $table->string('product_type_code')->nullable();
            $table->string('conc_consent_flag')->nullable();
            $table->string('contract_term_code')->nullable();
            $table->string('invoice_delivery_class')->nullable();
            $table->string('letter_delivery_class')->nullable();
            $table->string('company_type')->nullable();
            $table->string('industry_type_code')->nullable();
            $table->string('acn_number')->nullable();
            $table->string('trading_name')->nullable();
            $table->string('contracted_capacity_code')->nullable();
            $table->string('allow_sms_alerts')->nullable();
            $table->string('user_defined_5')->nullable();
            $table->string('create_web_user')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('smes');
    }
}