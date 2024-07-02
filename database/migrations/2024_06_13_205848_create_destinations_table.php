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
        Schema::create('destinations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('owner_id')->nullable('false');
            $table->string('name', 100)->nullable(false);
            $table->text('description')->nullable(false);
            $table->string('location')->nullable(false);
            $table->string('gmaps_url')->nullable(false);
            $table->string('price_range', 100)->default('0')->nullable(false);
            $table->enum('status', ['active', 'inactive'])->default('active')->nullable(false);
            $table->string('slug', 150)->nullable(false);
            $table->timestamps();

            $table->index('slug');
            $table->foreign('owner_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};
