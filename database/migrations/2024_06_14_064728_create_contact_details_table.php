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
            $table->enum('type', ['phone', 'email', 'fax', 'social_media'])->nullable(false);
            $table->string('value', 50)->nullable(false);

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
