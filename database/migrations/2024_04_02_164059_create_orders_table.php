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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userId')->references('id')->on('persons')->onDelete('cascade');
            $table->string("status")->default('inCart');
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
