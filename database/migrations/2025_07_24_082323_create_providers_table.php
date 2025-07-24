<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('providers', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('name');
        $table->string('specialization')->nullable();
        $table->string('location')->nullable();
        $table->decimal('consulting_fee', 10, 2)->default(0);
        $table->decimal('booking_fee', 10, 2)->default(0);
        $table->string('image_path')->nullable();
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
        Schema::dropIfExists('providers');
    }
}
