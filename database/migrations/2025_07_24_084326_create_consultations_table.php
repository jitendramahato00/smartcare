<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
{
    Schema::create('consultations', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('patient_id');
        $table->unsignedBigInteger('provider_id');
        $table->date('consultation_date'); // नाम बदला गया
        $table->time('consultation_time'); // नाम बदला गया
        $table->decimal('total_amount', 10, 2);
        $table->string('payment_method')->nullable();
        $table->enum('status', ['pending_approval', 'confirmed', 'rejected', 'completed', 'cancelled'])->default('pending_approval');
        $table->text('admin_notes')->nullable();
        $table->timestamps();

        // Foreign Keys
        $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultations');
    }
}
