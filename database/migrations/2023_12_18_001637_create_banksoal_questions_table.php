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
        Schema::create('banksoal_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('banksoal_id')->constrained();
            $table->text('question');
            $table->json('options');
            $table->integer('point')->default(50);
            $table->string('answer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banksoal_questions');
    }
};
