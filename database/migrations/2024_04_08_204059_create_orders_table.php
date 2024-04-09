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
            $table->foreignId("userId")->references("id")->on("users")->onDelete("cascade");
            $table->foreignId('order_details_id')->references('id')->on('order_details')->onDelete('cascade');
            $table->string("status")->nullable();
            $table->string('description');
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
