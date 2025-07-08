<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('gunung', function (Blueprint $table) {
            $table->string('gambar')->default('default-image.jpg')->change();
        });
    }

    public function down()
    {
        Schema::table('gunung', function (Blueprint $table) {
            $table->string('gambar')->nullable()->change();
        });
    }

};
