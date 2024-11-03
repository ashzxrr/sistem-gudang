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
        Schema::create('mutasis', function (Blueprint $table) {
            $table->id(); // Primary key.
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke tabel users.
            $table->foreignId('barang_id')->constrained()->onDelete('cascade'); // Relasi ke tabel barangs.
            $table->date('tanggal'); // Kolom tanggal mutasi.
            $table->string('jenis_mutasi'); // Kolom jenis mutasi (misalnya, masuk/keluar).
            $table->integer('jumlah'); // Kolom jumlah barang yang dimutasi.
            $table->timestamps(); // Kolom created_at dan updated_at.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mutasis');
    }
};
