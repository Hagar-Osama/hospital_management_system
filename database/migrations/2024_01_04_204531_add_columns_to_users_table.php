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
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('logged_in_at')->nullable();
            $table->timestamp('logged_out_at')->nullable();
            $table->integer('logged_in_counts')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('logged_in_at');
            $table->dropColumn('logged_out_at');
            $table->dropColumn('logged_in_counts');
        });
    }
};
