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
        Schema::create('digital_libraries_tags', function (Blueprint $table) {
            $table->foreignId('digital_library_id')->constrained('digital_libraries')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('tag_id')->constrained('tags')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('digital_libraries_tags');
    }
};
