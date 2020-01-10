<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Message;
use App\User;

class MessagesController extends Controller{

   /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct(){
      $this->middleware("auth");
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create(){

   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request){

   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id){

   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id){

   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id){

   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy(){
      Message::where("id", "=", Input::get("id"))->first()->delete();
   }

   /**
    * Create and store the new message.
    *
    * @param  \Illuminate\Http\Request  $request
    */
   public function send(Request $request){
      $recipiet = User::where("e_mail", "=", trim($request->recipientEmail))->first();
      $sender = User::where("e_mail", "=", $request->senderEmail)->first();
      DB::table("messages")->insert([
         "sender_id" => $sender->id,
         "recipient_id" => $recipiet->id,
         "content" => $request->messageContent
      ]);
      return redirect()->route("user.profile", [
         "e_mail" => $sender->e_mail,
         "tab" => "messages"
      ]);
   }
}
