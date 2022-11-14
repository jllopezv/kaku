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
        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(1);

            $table->morphs('translatable');
            $table->string('locale',6);
            $table->text('content');
            $table->unique(['translatable_type', 'translatable_id', 'locale']);

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
        Schema::dropIfExists('translations');
    }
};