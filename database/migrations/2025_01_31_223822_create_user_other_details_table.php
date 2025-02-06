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
        Schema::create('user_other_details', function (Blueprint $table) {
            $table->bigIncrements('uod_id');
            $table->string('address_proof')->nullable();
            $table->string('id_proof')->unique('users_email_unique');
            $table->string('passport_number', 225);
            $table->string('passport_exp_on', 225);
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_other_details');
    }
};
