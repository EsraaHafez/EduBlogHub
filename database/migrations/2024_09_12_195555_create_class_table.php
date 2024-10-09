<?php
 // database/migrations/xxxx_xx_xx_xxxxxx_create_class_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassTable extends Migration
{
    public function up()
    {
        Schema::create('class', function (Blueprint $table) {
            $table->id('ClassID');
            $table->string('ClassName');
            $table->unsignedBigInteger('TeacherID')->nullable();
            $table->integer('student_count')->default(0);
            $table->timestamps();

            $table->foreign('TeacherID')->references('TeacherID')->on('teacher')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('class');
    }
}
