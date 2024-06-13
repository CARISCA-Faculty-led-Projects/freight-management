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
        Schema::table('shipments', function (Blueprint $table) {
            $table->string('pickup_address')->nullable();
            $table->string('dropoff_address')->nullable();
            $table->uuid('mask');
            $table->string('approval_status')->default("Approved");
            $table->text('loads');
            $table->string('shipment_status');
            $table->string('load_assignment_method')->default('Assign Later');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shipments', function (Blueprint $table) {
            //
        });
    }
};
