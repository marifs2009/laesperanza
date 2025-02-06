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
        Schema::create('user_login_otp', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('email', 100);
            $table->string('otp', 100);
            $table->timestamp('created_at')->useCurrent();
            $table->integer('send_to_user_id')->default(1)->comment('registration=1,verify=2; Login=3;');
            $table->integer('is_active')->default(1);
            $table->integer('web_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_login_otp');
    }
};
