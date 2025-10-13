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
        Schema::create('highlight_items', function (Blueprint $table) {
            $table->id();
            $table->string('icon');          // Store icon filename or path
            $table->string('title');         // Icon title
            $table->text('description');     // Icon description
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('highlight_items');
    }
};
