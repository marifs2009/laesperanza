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
        Schema::create('feedback', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('user_name', 250)->nullable();
            $table->string('user_email', 250)->nullable();
            $table->bigInteger('user_contact_no')->nullable();
            $table->string('user_subject', 250)->nullable();
            $table->text('user_msg')->nullable();
            $table->string('user_address', 500)->nullable();
            $table->dateTime('created_on')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
