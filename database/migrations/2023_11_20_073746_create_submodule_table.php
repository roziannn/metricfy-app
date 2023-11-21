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
            Schema::create('submodules', function (Blueprint $table) {
                $table->id();
                $table->string('module_title');
                $table->string('sub_name');
                $table->string('slug')->unique()->after('sub_name');
                $table->longText('content');
                $table->foreignId('module_id')->constrained('modules');
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submodule');
    }
};
