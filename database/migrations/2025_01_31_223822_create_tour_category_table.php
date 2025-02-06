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
        Schema::create('tour_category', function (Blueprint $table) {
            $table->integer('tour_category_id', true);
            $table->integer('tour_parent_category_id')->nullable();
            $table->integer('category_level')->nullable();
            $table->string('tour_category_title');
            $table->string('tour_category_subtitle')->nullable();
            $table->string('tour_category_slug');
            $table->text('tour_category_excerpt')->nullable();
            $table->longText('tour_category_content')->nullable();
            $table->string('tour_category_banner')->nullable();
            $table->string('tour_category_meta_title')->nullable();
            $table->longText('tour_category_meta_description')->nullable();
            $table->string('tour_category_meta_keywords')->nullable();
            $table->longText('tour_category_other_header_scripts')->nullable();
            $table->integer('status')->default(1);
            $table->dateTime('created_at')->useCurrentOnUpdate()->useCurrent();
            $table->dateTime('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_category');
    }
};
