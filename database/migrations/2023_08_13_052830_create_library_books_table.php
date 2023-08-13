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
        Schema::create('library_books', function (Blueprint $table) {
            $table->id();
            $table->string('isbn', 255)->nullable();
            $table->string('title', 255)->nullable();
            $table->string('author', 255)->nullable();
            $table->string('publisher', 255)->nullable();
            $table->string('edition', 255)->nullable();
            $table->string('year', 255)->nullable();
            $table->string('pages', 255)->nullable();
            $table->integer('copies')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('category', 255)->nullable();
            $table->string('rack', 255)->nullable();
            $table->boolean('is_active')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('library_books');
    }
};
