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
        Schema::create('media_resources', function (Blueprint $table) {
            $table->id(); // Auto ID (SERIAL PK)
            $table->string('slug', 150); // element name (like home-hero-banner)
            $table->string('title', 255)->nullable(); // Human-readable name
            $table->foreignId('media_id')->nullable()->constrained('media')->onDelete('cascade');
            $table->text('path'); // URL of the page (/home)
            $table->string('alt_text', 255)->nullable(); // Alternative text (for accessibility)
            $table->string('caption', 255)->nullable(); // Optional caption or description
            $table->string('category', 100)->nullable(); // Optional grouping like homepage, gallery, promo
            $table->timestamps(); // uploaded_at = created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_resources');
    }
};
