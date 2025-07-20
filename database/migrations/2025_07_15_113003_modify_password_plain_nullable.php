<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
// Dalam file migrasi:
public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('password_plain')->nullable()->change();
    });
}

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
