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
        Schema::create('chartered_plane_services', function (Blueprint $table) {
            $table->bigIncrements('chartered_service_id');
            $table->string('chartered_service_title');
            $table->string('chartered_service_image');
            $table->integer('chartered_service_description');
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
        Schema::dropIfExists('chartered_plane_services');
    }
};
