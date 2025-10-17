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
        Schema::create('variant_price_with_countries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->index();
            $table->unsignedBigInteger('country_id')->index();
            $table->unsignedBigInteger('variant_id')->index();
            $table->decimal('price', 10, 2)->default(0);
            $table->boolean('status')->default(true)->comment('1 = enabled, 0 = disabled');
            $table->timestamps();
            $table->softDeletes(); 

            $table->unique(['product_id', 'country_id', 'variant_id'], 'product_country_variant_unique');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variant_price_with_countries');
        
    }
};
