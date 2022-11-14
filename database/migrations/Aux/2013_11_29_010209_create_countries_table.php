<?php

use App\Lopsoft\LopDatabase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {

            $table->id();
            $table->string('country')->unique();
            $table->string('nicename');
            $table->string('iso');
            $table->string('iso3')->nullable();
            $table->string('numcode')->nullable();
            $table->string('phonecode')->nullable();
            $table->string('language')->nullable();
            $table->timestamps();
            
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
        Schema::dropIfExists('countries');
    }
};
