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
        Schema::create('pembayarandetails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pembayaran')->constrained('pembayarans')->cascadeOnDelete();
            $table->date('tanggal_pembayaran');
            $table->bigInteger('jumlah_pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarandetail');
    }
};
