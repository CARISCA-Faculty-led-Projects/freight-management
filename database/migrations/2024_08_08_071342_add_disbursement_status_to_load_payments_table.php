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
        Schema::table('load_payments', function (Blueprint $table) {
            $table->enum('disbursement_status',['Holding','Released'])->default('Holding');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('load_payments', function (Blueprint $table) {
            $table->dropColumn('disbursement_status');
        });
    }
};
