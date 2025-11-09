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
        Schema::create('project_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->string('image_path')->comment('Path to the project image');
            $table->string('alt_text')->nullable()->comment('Alternative text for the project image');
            $table->boolean('is_primary')->default(false)->comment('Whether this image is the primary image for the project');
            $table->integer('order')->default(0)->comment('Display order of the image within the project');
            $table->timestamps();

            $table->index(['project_id', 'is_primary', 'order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_images');
    }
};

// The File name will be with the project name and the id of the picture
