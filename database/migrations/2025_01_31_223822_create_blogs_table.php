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
        Schema::create('blogs', function (Blueprint $table) {
            $table->integer('blog_id', true);
            $table->integer('blog_category')->default(1);
            $table->string('blog_title')->nullable();
            $table->string('blog_slug')->nullable();
            $table->mediumText('blog_excerpt')->nullable();
            $table->longText('blog_content')->nullable();
            $table->string('blog_banner', 500)->nullable();
            $table->string('blog_img', 500)->nullable();
            $table->text('blog_meta_title')->nullable();
            $table->mediumText('blog_meta_keyword')->nullable();
            $table->longText('blog_description')->nullable();
            $table->text('blog_other_header_html')->nullable();
            $table->boolean('status')->default(true)->comment('1=>Not Deleted, 0=>Deleted');
            $table->timestamp('created_on')->useCurrent();
            $table->string('created_by', 150)->nullable();
            $table->timestamp('updated_on')->useCurrent();
            $table->string('updated_by', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
