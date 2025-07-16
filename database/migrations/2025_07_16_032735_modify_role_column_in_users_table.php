<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyRoleColumnInUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Purana role column hatao
            $table->dropColumn('role');
        });

        Schema::table('users', function (Blueprint $table) {
            // Naya enum column add karo
            $table->enum('role', ['patient', 'doctor', 'admin'])->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Wapas teacher add karna ho toh ye use hota
            $table->enum('role', ['teacher'])->nullable();
        });
    }
}
