<?php
 // database/migrations/xxxx_xx_xx_xxxxxx_create_student_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->id('StudentID');
            $table->string('Name');
            $table->integer('Age');
            $table->unsignedBigInteger('division_id')->nullable();
            $table->unsignedBigInteger('ClassID')->nullable();
            $table->timestamps();

            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('set null');
            $table->foreign('ClassID')->references('ClassID')->on('class')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('student');
    }
}

