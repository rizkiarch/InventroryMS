<?php

use App\Models\User;
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
        Schema::create('transaction_ins', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->nullable();
            $table->string('name_supplier')->nullable();
            $table->string('code_product')->nullable();
            $table->string('name_product')->nullable();
            $table->string('info')->nullable();
            $table->decimal('price')->nullable();
            $table->integer('qty')->nullable();
            $table->boolean('status')->default(1);
            $table->foreignIdFor(User::class, 'user_id')->nullable()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_ins');
    }
};
