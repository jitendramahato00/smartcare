<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDutyTimesToAdminhospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adminhospitals', function (Blueprint $table) {
            // ये दो नई कॉलम 'clinic_address' कॉलम के बाद बनेंगी
            
            // ड्यूटी शुरू होने का समय
            $table->time('duty_start_time')->nullable()->after('clinic_address');
            
            // ड्यूटी खत्म होने का समय
            $table->time('duty_end_time')->nullable()->after('duty_start_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adminhospitals', function (Blueprint $table) {
            // अगर माइग्रेशन को वापस लेना पड़े तो ये कॉलम हटा दिए जाएंगे
            $table->dropColumn(['duty_start_time', 'duty_end_time']);
        });
    }
}