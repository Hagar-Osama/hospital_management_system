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
        Schema::create('package_offers', function (Blueprint $table) {
            $table->id();
            $table->decimal('original_price');
            $table->decimal('discount_price');
            $table->decimal('discount_value');
            $table->string('tax_rate');
            $table->decimal('total_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_offers');
    }
};
