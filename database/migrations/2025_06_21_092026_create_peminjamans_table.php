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
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('nama');
            $table->foreignId('barang_id')->constrained('barangs');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->foreignId('instansi_id')->constrained('instansis');
            $table->string('no_telp');
            $table->text('keperluan');
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak','selesai'])->default('menunggu');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamans');
    }
};
