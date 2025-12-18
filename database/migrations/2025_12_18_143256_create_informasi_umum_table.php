<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('informasi_umum', function (Blueprint $table) {
            $table->id('informasi_id');
            $table->string('judul');
            $table->text('isi');
            $table->date('tanggal');
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('informasi_umum');
    }
};
