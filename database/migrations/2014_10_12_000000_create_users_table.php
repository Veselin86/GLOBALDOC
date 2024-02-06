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
        Schema::create('users', function (Blueprint $table) {
            $table->unsignedInteger('nia')->primary(); //$table->unsignedInteger('nia', 8)->primary(); ERROR AL CREAR LA TABLA MULTIPLPES PK
            $table->string('name');
            $table->string('email')->unique();
            // $table->string('profile_picture');
            // $table->date('last_login_at');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
