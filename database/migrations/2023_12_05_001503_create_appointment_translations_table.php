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
        Schema::create('appointment_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();
            $table->unique(['appointment_id', 'locale']);
            $table->foreignId('appointment_id')->constrained('appointments')->cascadeOnDelete();

            // Actual fields you want to translate
            $table->string('day');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_translations');
    }
};
