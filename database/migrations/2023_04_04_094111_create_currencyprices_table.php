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

        Schema::create('currencyprices', function (Blueprint $table) {
            $table->id();
            $table->double('today_price');
            $table->double('yesterday_price');
            $table->string('percentage');
            $table->date('Date_Time');
            $table->foreignId('currency_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencyprices');
    }
};
