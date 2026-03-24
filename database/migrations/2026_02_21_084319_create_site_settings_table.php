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
        Schema::create('site_settings', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email');
    $table->string('country');
    $table->string('state');
    $table->string('city');
    $table->string('favicon')->nullable();
    $table->string('logo')->nullable();
    $table->string('landline')->nullable();
    $table->string('primary_number');
    $table->string('secondary_number')->nullable();
    $table->string('website')->nullable();
    $table->string('zip')->nullable();
    $table->text('instagram')->nullable();
    $table->text('youtube')->nullable();
    $table->text('google')->nullable();
    $table->text('facebook')->nullable();
    $table->string('address')->nullable();
    $table->text('map')->nullable();
    $table->boolean('status')->default(0); 
    $table->timestamps();
   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
