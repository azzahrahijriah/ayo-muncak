<?php

namespace App\Models;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePengalamanTable extends Migration
{
    public function up()
    {
        Schema::create('pengalaman', function (Blueprint $table) {
            $table->id('id_pengalaman');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id')->nullable();
            $table->date('tanggal_pendakian')->nullable();
            $table->boolean('sampai_puncak')->nullable();
            $table->enum('tingkat_kesulitan', ['Ringan', 'Sedang', 'Sulit', 'Lupa'])->nullable();
            $table->json('resiko_pendakian')->nullable();
            $table->text('catatan')->nullable();
            $table->date('tanggal')->nullable();
            $table->text('deskripsi')->nullable();
            $table->renameColumn('id', 'id');
        });
        
    }
    

    public function down()
    {
        Schema::table('pengalaman', function (Blueprint $table) {
            $table->renameColumn('id', 'id');
        });
    }
}