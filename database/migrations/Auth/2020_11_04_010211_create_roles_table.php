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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(1);
            $table->string('role')->unique();
            $table->string('description')->default('');
            $table->unsignedInteger('level')->default( config('lopsoft.user_level') );
            $table->string('dashboard')->default('user');
            $table->unsignedBigInteger('quota')->default( config('lopsoft.default_quota'));
            $table->boolean('unlimited_quota')->default(false);
            $table->foreignId('color_id')->nullable()->references('id')->on('colors');
            $table->timestamps();
            $table->foreignId('created_by')->nullable()->references('id')->on('users')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
