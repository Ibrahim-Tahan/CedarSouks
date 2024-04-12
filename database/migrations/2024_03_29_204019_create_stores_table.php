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
            $table->string('isApproved')->default('pending');
            $table->foreignId("sellerId")->references("id")->on("persons")->onDelete("cascade");
            $table->string('logo')->default('https://cdn-icons-png.flaticon.com/128/679/679746.png');
            $table->string('description');
            $table->string('address')->nullable();
            $table->double('longitude')->nullable();
            $table->double('latitude')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
