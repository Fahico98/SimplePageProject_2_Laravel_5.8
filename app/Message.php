<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model{

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
      "content",
      "sender_id",
      "recipient_id"
   ];

   public function recipient(){
      return $this->belongsTo(User::class);
   }

   public function sender(){
      return $this->belongsTo(User::class);
   }
}
