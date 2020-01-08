<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DefineForeignKeys extends Migration{

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up(){

      Schema::table('users', function(Blueprint $table){
         $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
      });

      Schema::table('posts', function(Blueprint $table){
         $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
         $table->foreign('post_permission_id')->references('id')->on('post_permissions')->onDelete('cascade');
      });

      Schema::table("follower_followed", function(Blueprint $table){
         $table->foreign("follower_id")->references("id")->on("users")->onDelete("cascade");
         $table->foreign("followed_id")->references("id")->on("users")->onDelete("cascade");
      });

      Schema::table("user_like_post", function(Blueprint $table){
         $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
         $table->foreign("post_id")->references("id")->on("posts")->onDelete("cascade");
      });

      Schema::table("user_dislike_post", function(Blueprint $table){
         $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
         $table->foreign("post_id")->references("id")->on("posts")->onDelete("cascade");
      });

      Schema::table("messages", function(Blueprint $table){
         $table->foreign("sender_id")->references("id")->on("users")->onDelete("cascade");
         $table->foreign("recipient_id")->references("id")->on("users")->onDelete("cascade");
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down(){

      Schema::table('users', function(Blueprint $table){
         $table->dropForeign("users_role_id_foreign");
      });

      Schema::table('posts', function(Blueprint $table){
         $table->dropForeign("posts_user_id_foreign");
         $table->dropForeign("posts_post_permission_id_foreign");
      });

      Schema::table("user_like_post", function(Blueprint $table){
         $table->dropForeign("user_like_post_user_id_foreign");
         $table->dropForeign("user_like_post_post_id_foreign");
      });

      Schema::table("user_dislike_post", function(Blueprint $table){
         $table->dropForeign("user_dislike_post_user_id_foreign");
         $table->dropForeign("user_dislike_post_post_id_foreign");
      });

      Schema::table("follower_followed", function(Blueprint $table){
         $table->dropForeign("follower_followed_follower_id_foreign");
         $table->dropForeign("follower_followed_followed_id_foreign");
      });

      Schema::table("messages", function(Blueprint $table){
         $table->dropForeign("messages_sender_id_foreign");
         $table->dropForeign("messages_recipient_id_foreign");
      });
   }
}
