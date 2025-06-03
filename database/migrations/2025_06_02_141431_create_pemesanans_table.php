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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('lapangan_id')->constrained('lapangan')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('tanggal_booking');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->integer('durasi');
            $table->float('total_bayar');
            $table->enum('status_pemesanan', ['dikonfirmasi', 'menunggu konfirmasi', 'ditolak'])->default('menunggu konfirmasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
