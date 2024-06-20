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
        Schema::create('contact_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('destination_id')->nullable(false);
            $table->string('phone', 20)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('social_media', 100)->nullable();

            $table->foreign('destination_id')->references('id')->on('destinations')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_details');
    }
};
