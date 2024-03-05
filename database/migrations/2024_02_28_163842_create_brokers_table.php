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
        Schema::create('brokers', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->foreignUuid('organisation_id');
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->string('load_type_id');
            $table->longText('description')->nullable();
            $table->string('status');
            $table->string('national_id')->nullable();
            $table->string('mask');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brokers');
    }
};
