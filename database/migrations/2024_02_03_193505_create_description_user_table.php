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
        Schema::create('description_user', function (Blueprint $table) {
            $table->unsignedBigInteger('description_id')->index();
            $table->unsignedInteger('user_id')->index();
            $table->foreign('description_id')->references('id')->on('descriptions')->onDelete('cascade');
            $table->foreign('user_id')->references('nia')->on('users')->onDelete('cascade');
            $table->integer('rating');
            
            // $table->integer('rating'); DEBERIA DE SER SIN UNIQUE() porque si es con unique()
            // solo se podría tener una calificación para una descripción a través de todos los usuarios

            $table->date('rating_date');
            $table->timestamps();
            $table->primary(['description_id', 'user_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('description_user');
    }
};
