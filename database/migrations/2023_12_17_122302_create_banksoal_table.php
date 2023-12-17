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
        Schema::create('banksoal', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique()->after('title');
            $table->text('desc');
            $table->string('topic');
            $table->integer('level');
            $table->time('estimated_duration')->nullable();
            $table->string('token')->nullable();
            $table->string('history')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banksoal');
    }
};
