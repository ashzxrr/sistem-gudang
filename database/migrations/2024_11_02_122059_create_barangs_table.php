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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id(); // Primary key.
            $table->string('nama_barang'); // Kolom nama barang.
            $table->string('kode')->unique(); // Kolom kode barang unik.
            $table->string('kategori'); // Kolom kategori barang.
            $table->string('lokasi'); // Kolom lokasi barang.
            $table->timestamps(); // Kolom created_at dan updated_at.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
