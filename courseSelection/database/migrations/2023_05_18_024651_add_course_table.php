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
        Schema::create('teacher_courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('teacherId');
            $table->integer('maxStudentNum');
            $table->integer('nowStudentNum');
            $table->integer('credit');
            $table->integer('math')->nullable();
            $table->integer('science')->nullable();
            $table->integer('engineeringTheory')->nullable();
            $table->integer('engineeringDesign')->nullable();
            $table->integer('generalEducation')->nullable();
            $table->string('relate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_courses');
    }
};
