<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id();
            $table->foreignId("buyersId")->references("id")->on("persons")->onDelete("cascade");
            $table->foreignId("productId")->references("id")->on("products")->onDelete("cascade");
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('wishlists');
    }
};
