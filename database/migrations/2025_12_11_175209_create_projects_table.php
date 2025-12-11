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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('short_description');
            $table->longText('full_description');
            $table->json('tech_stack'); // ["Laravel", "Vue.js", "MySQL"]
            $table->string('github_link')->nullable();
            $table->string('live_link')->nullable();
            $table->string('zip_file_path')->nullable(); // storage/app/public/projects/zips/file.zip
            $table->string('cover_image_path')->nullable(); // storage/app/public/projects/images/cover.jpg
            $table->boolean('is_featured')->default(false);
            $table->integer('order')->default(0);
            $table->timestamps();

            // Indexes
            $table->index('slug');
            $table->index('is_featured');
            $table->index('order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
