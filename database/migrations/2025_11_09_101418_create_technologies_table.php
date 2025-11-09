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
        Schema::create('technologies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->comment('Name of the technology');
            $table->string('slug')->unique()->comment('URL-friendly identifier');
            $table->string('icon')->nullable()->comment('Path to the technology icon');
            $table->enum('category', ['language', 'framework', 'database', 'tool', 'devops', 'other'])->comment('Category of the technology');
            $table->string('color')->nullable()->comment('Color associated with the technology');
            $table->integer('order')->default(0)->comment('Display order of the technology');
            $table->timestamps();

            $table->index(['category', 'order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technologies');
    }
};
