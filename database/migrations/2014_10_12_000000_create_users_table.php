<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration{

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up(){
      Schema::create('users', function(Blueprint $table){
         $table->bigIncrements('id');
         $table->string('name');
         $table->string("lastname");
         $table->tinyInteger("age");
         $table->string("country");
         $table->string("city");
         $table->string("phone_number")->unique();
         $table->string('e_mail')->unique();
         $table->string('password');
         $table->bigInteger("role_id")->nullable();
         $table->timestamp('email_verified_at')->nullable();
         $table->rememberToken();
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down(){
      Schema::dropIfExists('users');
   }
}
