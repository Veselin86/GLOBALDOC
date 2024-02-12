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
        // Schema::create('description_idea', function (Blueprint $table) {
        //     $table->unsignedBigInteger('description_id')->index();
        //     $table->unsignedBigInteger('idea_id')->index();
        //     $table->foreign('description_id')->references('id')->on('descriptions')->onDelete('cascade');
        //     $table->foreign('idea_id')->references('id')->on('ideas')->onDelete('cascade');
        //     $table->timestamps();
        //     $table->primary(['description_id', 'idea_id']);
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('description_idea');
    }
};
