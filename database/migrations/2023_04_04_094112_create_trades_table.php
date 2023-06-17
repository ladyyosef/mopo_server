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

        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_number')->constrained('accounts')->onDelete('cascade');
            $table->foreignId('currency_id_out')->constrained()->onDelete('cascade');
            $table->foreignId('currency_id_in')->constrained()->onDelete('cascade');
            $table->double('price');
            $table->boolean('Status')->default();
            $table->double('quantity');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trades');
    }
};
