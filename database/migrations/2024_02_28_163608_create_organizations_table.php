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
            $table->string('country')->nullable();
            $table->string('region')->nullable();
            $table->string('load_type')->nullable();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('address')->nullable();
            $table->string('registration_docs')->nullable();
            $table->string('insurance_docs')->nullable();
            $table->string('mask');
            $table->string('status')->default('Pending');
            $table->string('tax_id')->nullable();
            $table->string('account_id')->nullable();
            $table->string('password');
            $table->timestamp('last_login')->nullable();
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
