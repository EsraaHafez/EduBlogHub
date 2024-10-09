<?php
 
 // database/migrations/xxxx_xx_xx_xxxxxx_create_comment_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration
{
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->id('CommentID');
            $table->text('Content');
            $table->unsignedBigInteger('PostID')->nullable();
            $table->unsignedBigInteger('AuthorID')->nullable();
            $table->timestamp('DateCreated')->useCurrent()->useCurrentOnUpdate();
            $table->timestamps();

            $table->foreign('PostID')->references('PostID')->on('blogpost')->onDelete('set null');
            $table->foreign('AuthorID')->references('UserID')->on('user')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comment');
    }
}
