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
        Schema::create('master_offers', function (Blueprint $table) {
            $table->bigIncrements('offer_id');
            $table->longText('offer_title');
            $table->longText('offer_description');
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
        Schema::dropIfExists('master_offers');
    }
};
