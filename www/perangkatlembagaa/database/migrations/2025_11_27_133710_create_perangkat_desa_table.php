<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perangkat_desa', function (Blueprint $table) {

            $table->id('perangkat_id');

            // FK ke tabel wargas (kolom id)
            $table->unsignedBigInteger('warga_id');

            $table->string('jabatan');
            $table->string('nip')->nullable();
            $table->string('kontak')->nullable();
            $table->date('periode_mulai')->nullable();
            $table->date('periode_selesai')->nullable();
            $table->timestamps();

            // FOREIGN KEY BENAR
            $table->foreign('warga_id')
                  ->references('id')         // PK tabel wargas
                  ->on('wargas')             // nama tabel benar
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perangkat_desa');
    }
};
