<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_teacher_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherTable extends Migration
{
    public function up()
    {
        Schema::create('teacher', function (Blueprint $table) {
            $table->id('TeacherID');
            $table->string('Name');
            $table->date('HireDate');
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->timestamps();

            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('set null');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('teacher');
    }
}
