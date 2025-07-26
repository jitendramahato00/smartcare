<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('bookings', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('patient_id');
        $table->unsignedBigInteger('provider_id'); // <-- बदला हुआ नाम
        $table->date('booking_date'); // <-- बदला हुआ नाम
        $table->time('booking_time'); // <-- बदला हुआ नाम
        $table->decimal('total_amount', 10, 2);
        $table->string('payment_method')->nullable();
        $table->enum('status', ['pending_approval', 'confirmed', 'rejected', 'completed', 'cancelled'])->default('pending_approval');
        $table->text('admin_notes')->nullable();
        $table->timestamps();

        // Foreign Keys
        $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade'); // <-- बदला हुआ नाम
    });
}
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
