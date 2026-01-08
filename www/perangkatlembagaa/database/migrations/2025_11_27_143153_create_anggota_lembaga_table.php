<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anggota_lembaga', function (Blueprint $table) {
            $table->id('anggota_id');

            // FK ke lembaga_desa
            $table->unsignedBigInteger('lembaga_id');
            $table->foreign('lembaga_id')
                  ->references('lembaga_id')
                  ->on('lembaga_desa')
                  ->onDelete('cascade');

            // FK ke warga (tabel wargas, PK = id)
            $table->unsignedBigInteger('warga_id');
            $table->foreign('warga_id')
                  ->references('id')
                  ->on('wargas')
                  ->onDelete('cascade');

            // FK ke jabatan (jika ada tabel jabatans)
            $table->unsignedBigInteger('jabatan_id')->nullable();

            $table->date('tgl_mulai')->nullable();
            $table->date('tgl_selesai')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anggota_lembaga');
    }
};
