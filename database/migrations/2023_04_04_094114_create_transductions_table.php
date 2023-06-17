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
        Schema::disableForeignKeyConstraints();

        Schema::create('transductions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('User_out')->constrained('users')->onDelete('cascade');
            $table->foreignId('User_in')->constrained('users')->onDelete('cascade');
            $table->foreignId('trade_id')->constrained()->onDelete('cascade');
            $table->foreignId('Wallet_id')->constrained('wallets')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transductions');
    }
};
