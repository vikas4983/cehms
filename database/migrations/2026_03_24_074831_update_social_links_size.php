<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->text('instagram')->change();
            $table->text('youtube')->change();
            $table->text('google')->change();
            $table->text('facebook')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('instagram')->change();
            $table->string('youtube')->change();
            $table->string('google')->change();
            $table->string('facebook')->change();
        });
    }
};
