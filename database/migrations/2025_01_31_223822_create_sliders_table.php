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
        Schema::create('sliders', function (Blueprint $table) {
            $table->bigIncrements('slider_id');
            $table->integer('slider_type_id');
            $table->string('slider_title');
            $table->string('slider_subtitle')->nullable();
            $table->string('slider_button_caption')->nullable();
            $table->string('slider_button_link')->nullable();
            $table->string('slider_picture');
            $table->text('slider_picture_alt')->nullable();
            $table->integer('slider_order');
            $table->integer('status')->default(1);
            $table->dateTime('created_at')->useCurrentOnUpdate()->default('0000-00-00 00:00:00');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
