<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->unsignedBigInteger('id_penulis');
            $table->unsignedBigInteger('id_penerbit');
            $table->unsignedBigInteger('id_kategori');
            $table->integer('tahun_terbit');
            $table->string('isbn');
            $table->integer('jumlah_tersedia');
            $table->timestamps();

            $table->foreign('id_penulis')->references('id')->on('penulis');
            $table->foreign('id_penerbit')->references('id')->on('penerbits');
            $table->foreign('id_kategori')->references('id')->on('kategoris');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
