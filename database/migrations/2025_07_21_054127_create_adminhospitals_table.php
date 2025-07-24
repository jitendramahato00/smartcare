<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminhospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminhospitals', function (Blueprint $table) {
            $table->bigIncrements('id');
         
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->text('biography')->nullable();

            // Clinic Details
            $table->string('clinic_name')->nullable();
            $table->string('clinic_address')->nullable();
           

            // Address
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();

            // Pricing
            $table->string('pricing_type')->nullable(); // e.g., Custom, Free, etc.
            $table->string('custom_price')->nullable();

            // Services & Specialization
            $table->text('services')->nullable(); // JSON or comma-separated
            $table->string('specialization')->nullable();

            // Education
            $table->string('degree')->nullable();
            $table->string('college')->nullable();
            $table->year('year_of_completion')->nullable();

            // Experience
            $table->string('hospital_name')->nullable();
            $table->year('experience_from')->nullable();
            $table->year('experience_to')->nullable();
            $table->string('designation')->nullable();

            // Awards
            $table->string('award')->nullable();
            $table->year('award_year')->nullable();

            // Memberships & Registrations
            $table->string('memberships')->nullable();
            $table->string('registration_number')->nullable();
            $table->year('registration_year')->nullable();

            // Status
            $table->boolean('status')->default(true);
            
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
        Schema::dropIfExists('adminhospitals');
    }
}
