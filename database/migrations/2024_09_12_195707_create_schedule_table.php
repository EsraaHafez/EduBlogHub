<?php

 // database/migrations/xxxx_xx_xx_xxxxxx_create_schedule_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleTable extends Migration
{
    public function up()
    {
        Schema::create('schedule', function (Blueprint $table) {
            $table->id('ScheduleID');
            $table->unsignedBigInteger('ClassID')->nullable();
            $table->string('Subject')->nullable();
            $table->unsignedBigInteger('TeacherID')->nullable();
            $table->time('Time');
            $table->time('Duration');
            $table->enum('Day', ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday']);
            $table->timestamps();

            $table->foreign('ClassID')->references('ClassID')->on('class')->onDelete('set null');
            $table->foreign('TeacherID')->references('TeacherID')->on('teacher')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('schedule');
    }
}
