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
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Title of the blog post');
            $table->string('slug')->unique()->comment('URL-friendly identifier');
            $table->string('excerpt', 300)->nullable()->comment('Short excerpt of the blog post');
            $table->longText('content')->nullable()->comment('Full content of the blog post');
            $table->string('featured_image')->nullable()->comment('Path to the featured image for the blog post');
            $table->unsignedInteger('reading_time')->nullable()->comment('Estimated reading time in minutes');
            $table->unsignedInteger('views_count')->default(0)->comment('Number of views for the blog post');
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft')->comment('Publication status of the blog post');
            $table->timestamp('published_at')->nullable()->comment('Date and time when the blog post was published');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['status', 'published_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
