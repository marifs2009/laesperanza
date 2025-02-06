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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->integer('enquiry_id', true);
            $table->string('enquiry_fname');
            $table->string('enquiry_lname');
            $table->string('enquiry_phone');
            $table->string('enquiry_email');
            $table->mediumText('enquiry_message');
            $table->boolean('status')->default(true)->comment('1=>Not Deleted, 0=>Deleted');
            $table->integer('created_by');
            $table->timestamp('created_on')->useCurrent();
            $table->integer('updated_by');
            $table->timestamp('updated_on')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
