<?php

use App\Models\Transaction_in;
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
        Schema::create('transaction_in_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Transaction_in::class)->nullable()->constrained()->onUpdate('cascade');
            $table->string('nama_supplier');
            $table->string('nama_barang');
            $table->integer('harga');
            $table->integer('jumlah');
            $table->integer('total');
            $table->string('keterangan');
            $table->$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_in_details');
    }
};
