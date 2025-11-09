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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('company')->comment('Name of the company');
            $table->string('position')->comment('Job position/title');
            $table->string('location')->nullable()->comment('Location of the experience');
            $table->text('description')->nullable()->comment('Description of the experience');
            $table->date('start_date')->comment('Start date of the experience');
            $table->date('end_date')->nullable()->comment('End date of the experience, null if ongoing');
            $table->boolean('is_current')->default(false)->comment('Indicates if the experience is current/ongoing');
            $table->string('employment_type')->nullable()->comment('Type of employment (e.g., full-time, part-time, contract)');
            $table->integer('order')->default(0)->comment('Display order of the experience');
            $table->timestamps();

            $table->index('is_current');
            $table->index('order');
            $table->index('start_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
