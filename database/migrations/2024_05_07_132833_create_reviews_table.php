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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('review')->nullable();
            $table->integer('rating')->nullable();
            $table->foreignId("userId")->references("id")->on("persons")->onDelete("cascade")->nullable();
            $table->foreignId("storeId")->references("id")->on("stores")->onDelete("cascade")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
