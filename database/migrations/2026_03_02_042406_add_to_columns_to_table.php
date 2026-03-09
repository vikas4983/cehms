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
        Schema::table('users', function (Blueprint $table) {
            $table->string('father_name')->nullable();
            $table->timestamp('dob')->nullable();
            $table->string('gender');
            $table->string('mobile');
            $table->string('address')->nullable();
            $table->string('qualification')->nullable();
            $table->string('practitioner_registration')->nullable();
            $table->string('image')->nullable();
            $table->string('10th_marksheet')->nullable();
            $table->string('12th_marksheet')->nullable();
            $table->tinyInteger('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['father_name', 'dob', 'status', 'image', 'gender', 'mobile', 'address', 'qualification', 'practitioner_registration','10th_marksheet','12th_marksheet' ,'others']);
        });
    }
};
