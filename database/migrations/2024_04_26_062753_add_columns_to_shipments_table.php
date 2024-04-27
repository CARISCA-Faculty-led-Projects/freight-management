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
            $table->string('approval_status');
            $table->string('payment_status');
            $table->string('shipment_status');
            $table->dropColumn('load_id');
            $table->string('load_type');
            $table->string('quantity');
            $table->string('weight');
            $table->string('handling');
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
