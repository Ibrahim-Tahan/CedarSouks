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
        Schema::create('event_user_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId("eventId")->references("id")->on("events")->onDelete('cascade');
            $table->foreignId("productId")->references("id")->on("products")->onDelete('cascade');
            $table->double("bidding_price")->nullable();
            $table->foreignId("userId")->nullable()->references("id")->on("persons")->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_user_products');
    }
};
