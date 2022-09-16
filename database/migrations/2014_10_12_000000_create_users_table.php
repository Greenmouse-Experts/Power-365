<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_type')->nullable();
            $table->integer('amount')->nullable();
            $table->string('photo')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('code')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone_number');
            $table->string('password');
            $table->string('i_agree');
            $table->string('gender')->nullable();
            $table->string('status')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('occupation')->nullable();
            $table->string('learning_opportunity')->nullable();
            $table->string('country_of_residence')->nullable();
            $table->string('state_of_residence')->nullable();
            $table->string('lga_of_residence')->nullable();
            $table->string('city_of_residence')->nullable();
            $table->string('home_address')->nullable();
            $table->string('business_address')->nullable();
            $table->string('state_of_origin')->nullable();
            $table->string('lga_of_origin')->nullable();
            $table->string('business_number')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('business_registered')->nullable();
            $table->string('business_oriented')->nullable();
            $table->string('business_generate_income')->nullable();
            $table->string('business_stage')->nullable();
            $table->string('business_areas')->nullable();
            $table->string('business_kind')->nullable();
            $table->string('business_amount')->nullable();
            $table->string('business_financed')->nullable();
            $table->string('business_time')->nullable();
            $table->string('asset')->nullable();
            $table->string('subscription_status')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
