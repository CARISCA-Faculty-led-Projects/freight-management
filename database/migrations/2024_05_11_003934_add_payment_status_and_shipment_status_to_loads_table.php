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
        Schema::table('loads', function (Blueprint $table) {
            $table->string("payment_status")->default('Unpaid')->after('status');
            $table->string("shipment_status")->default('Unassigned')->after('payment_status');
            $table->integer("completed")->default(0)->after('other_docs');
            $table->foreignUuid("organization_id")->nullable()->after('load_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('loads', function (Blueprint $table) {
            //
        });
    }
};
