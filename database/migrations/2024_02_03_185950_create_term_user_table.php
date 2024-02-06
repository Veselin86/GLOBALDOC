<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('term_user', function (Blueprint $table) {
            $table->unsignedBigInteger('term_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('user_id')->references('nia')->on('users')->onDelete('cascade');
            $table->primary(['term_id', 'user_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('term_user');
    }
};
