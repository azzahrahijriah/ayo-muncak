<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pengalaman', function (Blueprint $table) {
            $table->unsignedBigInteger('id_gunung')->nullable(); // relasi ke gunung
            $table->string('jalur_naik')->nullable();
            $table->string('jalur_turun')->nullable();
            $table->date('tanggal_pendakian')->nullable();
            $table->boolean('sampai_puncak')->default(false);
            $table->enum('tingkat_kesulitan', ['Ringan', 'Sedang', 'Sulit', 'Lupa'])->nullable();
            $table->json('resiko_pendakian')->nullable(); // disimpan dalam bentuk array JSON
            $table->text('catatan')->nullable();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengalaman', function (Blueprint $table) {
            //
        });
    }
};
