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
        Schema::create('old_students', function (Blueprint $table) {
             $table->id();
            $table->unsignedInteger('registration_no');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('father_name')->nullable();
            $table->dateTime('registration_date')->nullable();
            $table->string('address')->nullable();
            $table->timestamp('valid_form')->nullable();
            $table->string('course')->nullable();
            $table->string('city')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('old_students');
    }
};
