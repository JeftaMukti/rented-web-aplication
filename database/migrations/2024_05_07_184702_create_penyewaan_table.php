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
        Schema::create('penyewaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kontrakan')->constrained('kontrakan')->cascadeOnDelete();
            $table->foreignId('id_pengontrak')->constrained('pengontrak')->cascadeOnDelete();
            $table->date('tanggal_mulai');
            $table->date('tanggal_berakhir');
            $table->enum('status_pembayaran',['pending','tuntas'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyewaan');
    }
};
