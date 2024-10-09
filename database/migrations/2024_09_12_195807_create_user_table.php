<?php

 // database/migrations/xxxx_xx_xx_xxxxxx_create_user_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id('UserID');
            $table->string('User_Name');
            $table->string('E_mail')->unique();
            $table->string('Password');
            $table->enum('Role', ['Student', 'Teacher', 'Admin']);
            $table->timestamp('RegistrationDate')->useCurrent()->useCurrentOnUpdate();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user');
    }
}
