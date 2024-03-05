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
            $table->foreignUuid('organisation_id');
            $table->string('driver_id');
            $table->string('owner_id')->nullable();
            $table->string('image');
            $table->string('load_type');
            $table->string('vehicle_category_id');
            $table->string('vehicle_subcategory_id');
            $table->string('make');
            $table->string('model');
            $table->string('year');
            $table->string('color');
            $table->string('gps');
            $table->string('engine_type');
            $table->string('transmission');
            $table->string('fuel_consumption');
            $table->string('axle_type');
            $table->string('weight');
            $table->string('max_load_weight');
            $table->string('width');
            $table->string('height');
            $table->string('length');
            $table->string('owners_documents');
            $table->string('road_worth_documents');
            $table->string('insurance_documents');
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
