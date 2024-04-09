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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->double('price');
            $table->string('image')->nullable();
            $table->string('description');
            $table->foreignId('categoryId')->references('id')->on('categories')->onDelete('cascade');
            $table->foreignId('storeId')->references('id')->on('stores')->onDelete('cascade');
            $table->date('expiry_date')->nullable();
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
