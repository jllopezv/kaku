<?php

use App\Lopsoft\LopDatabase;
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
        Schema::table('users', function (Blueprint $table) {
            LopDatabase::addActive($table);
            LopDatabase::addOwnerUser($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            LopDatabase::dropActive($table);
            LopDatabase::dropOwnerUser($table);
        });
    }
};
