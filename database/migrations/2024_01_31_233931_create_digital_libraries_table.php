<?php

use App\Enums\PublicationStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('digital_libraries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('content');
            $table->string('article_image');
            $table->string('article_file');
            $table->json('authors')->nullable();
            $table->date('publication_date');
            $table->integer('article_year');
            $table->integer('article_volume');
            $table->integer('article_number_pages');
            $table->string('article_number');
            $table->string('isnn');
            $table->text('people_opinion')->nullable();
            $table->enum('status', ['Publicado', 'No Publicado'])->default(PublicationStatus::PUBLISHED->value);
            $table->foreignId('digital_library_category_id')->constrained('digital_library_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('administrator_id')->constrained('administrators')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('digital_libraries');
    }
};
