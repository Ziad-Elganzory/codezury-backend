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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Title of the project');
            $table->string('slug')->unique()->comment('URL-friendly identifier');
            $table->string('description', 500)->nullable()->comment('Short description with max 500 characters');
            $table->longText('long_description')->nullable()->comment('Detailed description of the project');
            $table->string('github_url')->nullable()->comment('Link to the GitHub repository');
            $table->string('live_url')->nullable()->comment('Link to the live project');
            $table->boolean('featured')->default(false)->comment('Whether the project is featured');
            $table->integer('order')->default(0)->comment('Display order of the project');
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft')->comment('Publication status of the project');
            $table->timestamp('published_at')->nullable()->comment('Date and time when the project was published');
            $table->unsignedInteger('views_count')->default(0)->comment('Number of views for the project');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['status', 'featured', 'published_at']);
            $table->index('order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
