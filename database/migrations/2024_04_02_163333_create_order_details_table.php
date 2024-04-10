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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreign('userId')->references('id')->on('persons')->onDelete('cascade');
            $table->foreignId('productId')->references('id')->on('products')->onDelete('cascade');
            $table->string('order_information')->nullable();
            $table->date('order_date');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};