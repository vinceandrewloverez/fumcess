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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();

            // student
            $table->string('student_first_name');
            $table->string('student_last_name');
            $table->date('date_of_birth');
            $table->string('grade_applied');

            // parent
            $table->string('parent_first_name');
            $table->string('parent_last_name');
            $table->string('email');
            $table->string('phone');

            // address
            $table->string('street');
            $table->string('city');
            $table->string('state');
            $table->string('zip');

            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
