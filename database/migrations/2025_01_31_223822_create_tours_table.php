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
        Schema::create('tours', function (Blueprint $table) {
            $table->integer('tour_id', true);
            $table->string('tour_code');
            $table->string('tour_title');
            $table->string('tour_subtitle')->nullable();
            $table->string('tour_duration');
            $table->text('tour_type')->nullable();
            $table->text('tour_location');
            $table->integer('tour_location_lat');
            $table->integer('tour_location_long');
            $table->longText('tour_description');
            $table->longText('tour_what_to_expect');
            $table->longText('tour_inclusion');
            $table->longText('tour_exclusion');
            $table->string('tour_group_size')->nullable();
            $table->longText('tour_available_offer')->nullable();
            $table->longText('tour_meals')->nullable();
            $table->longText('tour_transfer')->nullable();
            $table->longText('tour_tax')->nullable();
            $table->integer('tour_add_to_hot_deals')->nullable();
            $table->string('tour_featured_image')->nullable();
            $table->integer('draft')->default(1);
            $table->integer('publish')->default(0);
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
        Schema::dropIfExists('tours');
    }
};
