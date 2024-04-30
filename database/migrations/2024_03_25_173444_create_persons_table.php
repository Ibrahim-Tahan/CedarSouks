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
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 100); 
            $table->string('email', 191);
            $table->string('password', 255);
            $table->string('email_verification_code')->nullable();
            $table->integer('verified')->nullable();
            $table->rememberToken();
            $table->date('birth_date')->nullable();
            $table->string('user_type', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persons');
    }
};
