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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string('isApproved');
            $table->foreignId("sellerId")->references("id")->on("users")->onDelete("cascade");
            $table->string('logo')->nullable();
            $table->string('description');
            $table->string('address')->nullable();
            $table->string('longitude')->nullable();
            $table->string('lattitude')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
