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
        Schema::create('master_meal_types', function (Blueprint $table) {
            $table->bigIncrements('meal_type_id');
            $table->longText('meal_type_name');
            $table->longText('meal_type_description');
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
        Schema::dropIfExists('master_meal_types');
    }
};
