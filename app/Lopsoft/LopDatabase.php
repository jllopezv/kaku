<?php

namespace App\Lopsoft;

use Illuminate\Database\Schema\Blueprint;

class LopDatabase
{
    static public function addActive(Blueprint $table)
    {
        $table->boolean('active')->after('id')->default(1);
    }

    static public function dropActive(Blueprint $table)
    {
        $table->dropColumn('active');
    }

    static public function addOwnerUser(Blueprint $table)
    {
        $table->foreignId('created_by')->nullable()->references('id')->on('users')->onDelete('set null');
        $table->foreignId('updated_by')->nullable()->references('id')->on('users')->onDelete('set null');
    }

    static public function dropOwnerUser(Blueprint $table)
    {
        // Foreignkey Structure: <table_name>_<column_name>_foreign
        $table->dropConstrainedForeignId('created_by');
        $table->dropConstrainedForeignId('updated_by');
    }
}
