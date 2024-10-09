<?php

 // database/migrations/xxxx_xx_xx_xxxxxx_create_report_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportTable extends Migration
{
    public function up()
    {
        Schema::create('report', function (Blueprint $table) {
            $table->id('ReportID');
            $table->unsignedBigInteger('StudentID')->nullable();
            $table->unsignedBigInteger('TeacherID')->nullable();
            $table->date('FromDate');
            $table->date('ToDate');
            $table->string('Grades')->nullable();
            $table->text('Comments')->nullable();
            $table->timestamps();

            $table->foreign('StudentID')->references('StudentID')->on('student')->onDelete('set null');
            $table->foreign('TeacherID')->references('TeacherID')->on('teacher')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('report');
    }
}
