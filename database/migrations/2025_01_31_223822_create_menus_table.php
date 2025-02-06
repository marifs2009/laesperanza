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
        Schema::create('menus', function (Blueprint $table) {
            $table->integer('menu_id', true);
            $table->integer('menu_type_id');
            $table->integer('parent_menu_id');
            $table->string('menu_label');
            $table->tinyText('menu_link');
            $table->integer('menu_order');
            $table->boolean('status')->default(true)->comment('1=>Not Deleted, 0=>Deleted');
            $table->dateTime('created_at')->useCurrentOnUpdate()->useCurrent();
            $table->dateTime('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
