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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->bigIncrements('testimonial_id');
            $table->string('testimonial_name');
            $table->string('testimonial_picture');
            $table->string('testimonial_designation');
            $table->string('testimonial_stars');
            $table->longText('testimonial_text');
            $table->integer('status')->default(1);
            $table->dateTime('created_at')->useCurrentOnUpdate()->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
