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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('food_id')->constrained()->onDelete('cascade');
            $table->string('nama_pemesan');
            $table->string('no_hp');
            $table->integer('jumlah');

            $table->text('catatan')->nullable();
            // Tambahan untuk Midtrans
            $table->string('order_id')->unique(); // untuk menyimpan ID unik transaksi Midtrans
            $table->string('status')->default('pending'); // status pembayaran: pending, success, failed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
