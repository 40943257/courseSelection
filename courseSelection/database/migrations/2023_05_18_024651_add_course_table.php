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
        Schema::create('teacherCourses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('teacherId');
            $table->integer('maxStudentNum');
            $table->integer('nowStudentNum');
            $table->integer('credit');
            $table->string('relate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacherCourses');
    }
};
