<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail{

   use Notifiable;

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
      'name',
      "lastname",
      "country",
      "city",
      "phone_number",
      'e_mail',
      'password',
      "role_id",
      "profile_picture",
      "occupation",
      "biography"
   ];

   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
   protected $hidden = [
      'password',
      'remember_token'
   ];

   /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
   protected $casts = ['email_verified_at' => 'datetime'];

   public function role(){
      return $this->belongsTo(Role::class);
   }

   public function posts(){
      return $this->hasMany(Post::class);
   }

   public function isAdmin(){
      return $this->role->name === "administrator";
   }

   public function isSeller(){
      return $this->role->name === "seller";
   }

   public function likedPosts(){
      return $this->belongsToMany(Post::class, "user_like_post");
   }

   public function dislikedPosts(){
      return $this->belongsToMany(Post::class, "user_dislike_post");
   }

   public function followers(){
      return $this->belongsToMany(User::class, 'follower_followed', 'followed_id', 'follower_id');
   }

   public function following(){
      return $this->belongsToMany(User::class, 'follower_followed', 'follower_id', 'followed_id');
   }

   public function sentMessages(){
      return $this->hasMany(Message::class, "sender_id");
   }

   public function receivedMessages(){
      return $this->hasMany(Message::class, "recipient_id");
   }
}
