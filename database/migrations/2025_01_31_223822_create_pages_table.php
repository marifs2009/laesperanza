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
        Schema::create('pages', function (Blueprint $table) {
            $table->integer('page_id', true);
            $table->string('page_title');
            $table->string('page_subtitle')->nullable();
            $table->string('page_category')->nullable();
            $table->string('page_slug');
            $table->text('page_excerpt')->nullable();
            $table->longText('page_content')->nullable();
            $table->string('page_banner')->nullable();
            $table->string('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->longText('other_header_scripts')->nullable();
            $table->string('page_template')->nullable();
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
        Schema::dropIfExists('pages');
    }
};
