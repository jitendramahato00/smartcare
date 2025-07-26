<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
{
    Schema::create('payments', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('appointment_id');
        $table->decimal('amount', 10, 2);
        $table->enum('status', ['pending', 'successful', 'failed'])->default('pending');
        $table->string('transaction_id')->nullable();
        $table->text('payment_gateway_response')->nullable();
        $table->timestamps();

        // Foreign Key
        $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
