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

            $table->unsignedInteger('level')->nullable()->default( config('lopsoft.user_level') );
            $table->unsignedInteger('quota')->nullable()->default( config('lopsoft.default_quota') );
            $table->boolean('unlimited_quota')->default(false);
            $table->datetime('lastlogin')->nullable();
            $table->string('date_format')->default(config('lopsoft.date_format'));
            $table->foreignId('timezone_id')->nullable()->references('id')->on('timezones')->onDelete('set null');
            $table->foreignId('country_id')->nullable()->references('id')->on('countries')->onDelete('set null');
            $table->foreignId('language_id')->nullable()->references('id')->on('languages')->onDelete('set null');
            $table->nullableMorphs('profile');

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
