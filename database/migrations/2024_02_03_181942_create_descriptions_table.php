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
        Schema::create('descriptions', function (Blueprint $table) {
            $table->id();
            $table->text('notes');
            $table->text('synthesis');
            $table->unsignedBigInteger('terms_id');
            $table->foreign('terms_id')->references('id')->on('terms')->onDelete('cascade')->onUpdate('cascade');

            // $table->unsignedBigInteger('term_id'); // Cambiado a singular para seguir la convención
            // $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('descriptions');
    }
};
