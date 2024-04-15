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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('organization_id')->nullable();
            $table->string('image')->nullable();
            $table->string('name');
            $table->string('phone');
            $table->string('address')->nullable();
            $table->longText('description')->nullable();
            $table->text('load_type')->nullable();
            $table->string('status')->nullable();
            $table->string('license_number')->nullable();
            $table->string('license_image')->nullable();
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
        Schema::dropIfExists('drivers');
    }
};
