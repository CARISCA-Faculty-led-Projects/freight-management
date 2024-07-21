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
        Schema::create('loads', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('load_type');
            $table->string('sender_id');
            $table->longText('description')->nullable();
            $table->double('budget');
            $table->integer('quantity');
            $table->integer('length');
            $table->double('weight');
            $table->double('height');
            $table->double('breadth');
            $table->string('handling');
            $table->string('pickup_address')->nullable();
            $table->string('dropoff_address')->nullable();
            $table->string('insurance_docs')->nullable();
            $table->string('mask');
            $table->string('status'); // Bidding, Completed
            $table->string('other_docs')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loads');
    }
};
