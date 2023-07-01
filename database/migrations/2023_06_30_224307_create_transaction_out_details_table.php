<?php

use App\Models\Transaction_out;
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
        Schema::create('transaction_out_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Transaction_out::class)->nullable()->constrained()->onUpdate('cascade');
            $table->string('nama_konsumen');
            $table->string('nama_barang');
            $table->integer('harga');
            $table->integer('jumlah');
            $table->integer('total');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_out_details');
    }
};
