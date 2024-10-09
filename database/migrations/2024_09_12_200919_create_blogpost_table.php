<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_blogpost_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogpostTable extends Migration
{
    public function up()
    {
        Schema::create('blogpost', function (Blueprint $table) {
            $table->id('PostID');
            $table->string('Post_title');
            $table->text('Post_content');
            $table->unsignedBigInteger('AuthorID')->nullable();
            $table->timestamp('DateCreated')->useCurrent()->useCurrentOnUpdate();
            $table->string('Classification')->nullable();
            $table->timestamps();
            $table->string('image_url')->nullable();

            $table->foreign('AuthorID')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('blogpost');
    }
}
 
