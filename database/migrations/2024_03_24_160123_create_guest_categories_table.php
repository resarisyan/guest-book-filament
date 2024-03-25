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
        Schema::create('guest_categories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('guest_id')
                ->references('id')->on('guests')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignUuid('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest_categories');
    }
};
