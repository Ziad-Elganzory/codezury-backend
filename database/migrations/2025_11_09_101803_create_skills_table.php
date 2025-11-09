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
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Name of the skill');
            $table->string('category')->comment('Category of the skill');
            $table->enum('proficiency', ['beginner', 'intermediate', 'advanced', 'expert'])->comment('Proficiency level of the skill');
            $table->string('icon')->nullable()->comment('Path to the skill icon');
            $table->unsignedInteger('years_of_experience')->default(0)->comment('Years of experience with the skill');
            $table->integer('order')->default(0)->comment('Display order of the skill');
            $table->timestamps();

            $table->index(['category', 'order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
