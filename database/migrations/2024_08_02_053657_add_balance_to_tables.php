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
        Schema::table('senders', function (Blueprint $table) {
            $table->double('balance')->default(0);
        });
        Schema::table('brokers', function (Blueprint $table) {
            $table->double('balance')->default(0);
        });
        Schema::table('organizations', function (Blueprint $table) {
            $table->double('balance')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('senders', function (Blueprint $table) {
            $table->dropColumn('balance');
        });
        Schema::table('brokers', function (Blueprint $table) {
            $table->dropColumn('balance');
        });
        Schema::table('organizations', function (Blueprint $table) {
            $table->dropColumn('balance');
        });
    }
};
