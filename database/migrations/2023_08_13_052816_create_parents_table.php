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
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->string('salutation', 10)->nullable();
            $table->string('first_name', 50)->nullable();
            $table->string('middle_name', 50)->nullable();
            $table->string('last_name', 50)->nullable();
            $table->string('gender', 10)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('occupation', 255)->nullable();
            $table->text('address')->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('alternate_phone', 15)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('photo', 255)->nullable();
            $table->boolean('is_active')->nullable();
            $table->dateTime('last_active')->nullable();
            $table->boolean('is_married')->nullable();
            $table->unsignedBigInteger('spouse_id')->nullable();
            $table->boolean('is_guardian')->nullable();
            $table->boolean('can_login')->nullable();
            $table->string('password', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};
