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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('organization_id')->nullable();
            $table->string('driver_id')->nullable();
            $table->string('owner_id')->nullable();
            $table->string('image');
            $table->string('load_type');
            $table->string('number');
            $table->string('vehicle_category_id');
            $table->string('vehicle_subcategory_id');
            $table->string('make');
            $table->string('model');
            $table->string('year');
            $table->string('color');
            $table->string('mask');
            $table->string('gps');
            $table->string('engine_type');
            $table->string('transmission');
            $table->string('fuel_consumption');
            $table->string('axle_type');
            $table->string('weight')->nullable();
            $table->string('max_load_weight')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('length')->nullable();
            $table->string('owners_documents')->nullable();
            $table->string('road_worth_documents')->nullable();
            $table->string('insurance_documents')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
