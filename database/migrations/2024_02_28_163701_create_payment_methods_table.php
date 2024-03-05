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
        // For organisations and brokers
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('owner_id');
            $table->string('name');
            $table->string('card');
            $table->enum('type',['Credit','Debit']);
            $table->string('expiry');
            $table->string('cvv');
            $table->string('save');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
    }
};
