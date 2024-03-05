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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('country');
            $table->string('region');
            $table->string('load_type')->nullable();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('registration_docs')->nullable();
            $table->string('insurance_docs')->nullable();
            $table->string('mask');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organisations');
    }
};
