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
            $table->longText('description');
            $table->double('budget');
            $table->integer('quantity');
            $table->double('weight');
            $table->double('height');
            $table->double('breadth');
            $table->string('handling');
            $table->string('pickup_address');
            $table->string('dropoff_address');
            $table->string('sub_load_id');
            $table->string('approval_status');
            $table->string('insurance_docs');
            $table->string('other_docs');
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
