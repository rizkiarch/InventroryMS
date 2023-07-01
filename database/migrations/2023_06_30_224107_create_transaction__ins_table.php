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
        Schema::create('transaction__ins', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('nama_barang');
            $table->string('keterangan');
            $table->timestamps();
            // $table->integer('harga');
            // $table->integer('stok');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction__ins');
    }
};
