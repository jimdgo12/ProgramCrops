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
        Schema::table('seeds', function (Blueprint $table) {
            $table->foreignId('crop_id')->constrained('crops');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seeds', function (Blueprint $table) {
            $table->dropConstrainedForeignId('crop_id');
        });
    }
};
