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
        Schema::create('package_offer_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();
            $table->unique(['package_offer_id', 'locale', 'name']);
            $table->foreignId('package_offer_id')->constrained('package_offers')->cascadeOnDelete();

            // Actual fields you want to translate
            $table->string('name');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_offer_translations');
    }
};
