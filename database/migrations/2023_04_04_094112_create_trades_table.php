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
        Schema::disableForeignKeyConstraints();

        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'user_id_in')->constrained()->onDelete('cascade');
            $table->foreignIdFor(User::class, 'user_id_out')->constrained()->onDelete('cascade');
            $table->foreignId('currency_id_out')->constrained()->onDelete('cascade');
            $table->foreignId('currency_id_in')->constrained()->onDelete('cascade');
            $table->double('quantity_in');
            $table->boolean('status')->default(false);
            $table->double('quantity_out');
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
