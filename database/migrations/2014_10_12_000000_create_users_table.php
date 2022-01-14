<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('users', function (Blueprint $table) {
         $table->id();
         $table->boolean('active');
         $table->string('nombre');
         $table->string('apellidoaPaterno');
         $table->string('apellidoMaterno');
         $table->string('email')->unique();
         $table->enum('rol',['adm','profes','rh','tienda']);
         $table->string('password');
         $table->rememberToken();
         $table->timestamps();
         $table->softDeletes();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('users');
   }
}
