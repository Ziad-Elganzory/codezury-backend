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
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Name of the sender');
            $table->string('email')->comment('Email address of the sender');
            $table->string('subject')->comment('Subject of the message');
            $table->text('message')->comment('Content of the message');
            $table->string('ip_address')->nullable()->comment('IP address of the sender');
            $table->string('user_agent')->nullable()->comment('User agent of the sender');
            $table->timestamp('read_at')->nullable()->comment('Timestamp when the message was read');
            $table->timestamp('replied_at')->nullable()->comment('Timestamp when the message was replied to');
            $table->timestamps();

            $table->index('read_at');
            $table->index('created_at');
            $table->index('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};
