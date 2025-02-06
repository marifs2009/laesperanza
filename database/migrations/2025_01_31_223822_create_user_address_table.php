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
        Schema::create('user_address', function (Blueprint $table) {
            $table->bigIncrements('adrs_id');
            $table->string('adrs_type')->nullable();
            $table->string('hno')->unique('users_email_unique');
            $table->string('line1', 225);
            $table->string('line2', 225);
            $table->string('landmark');
            $table->string('country', 225);
            $table->string('state', 225);
            $table->string('city', 225);
            $table->string('pin', 225);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_address');
    }
};
