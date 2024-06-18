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
        Schema::table('opening_hours', function (Blueprint $table) {
            $table->unique(['destination_id', 'day']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('opening_hours', function (Blueprint $table) {
            $table->dropUnique('opening_hours_destination_id_day_unique');
        });
    }
};
