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
         Schema::create('home_descriptions', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('description'); // For CKEditor or Summernote HTML content
            $table->string('year');
            $table->string('year_description');

            $table->string('description_video'); // File path or name
            $table->string('video_description_text'); // Short caption or explanation

            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_descriptions');
    }
};
