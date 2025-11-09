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
        Schema::create('page_views', function (Blueprint $table) {
            $table->id();
            $table->morphs('viewable');
            $table->string('session_id')->comment('Session identifier for the page view');
            $table->string('ip_address')->nullable()->comment('IP address of the user who viewed the page');
            $table->string('user_agent')->nullable()->comment('User agent of the user who viewed the page');
            $table->timestamps();

            $table->unique(['viewable_id', 'viewable_type', 'session_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_views');
    }
};
