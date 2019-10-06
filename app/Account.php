<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class Account extends Model
{
   public $id;

   public static function get_all_user() {
    
    $result = DB::table('connection')->select('receiver_id')
                  ->where('sender_id', Auth::user()->id)
                  ->get();  
    
    $receiver_id = $result->pluck('receiver_id');
   
       return DB::table('users')->select('users.id','users.name', 'users.photo')
        ->where('users.id','!=', Auth::user()->id)
        ->whereNotIn('users.id', $receiver_id)
        ->get();
    
    
   } 

   public static function get_my_profile() {

    return DB::table('users')
               ->where('id', Auth::user()->id)
               ->first();
   }

   public static function get_user_profile($id) {

    return DB::table('users')
               ->select('id', 'name', 'photo', 'email', 'phone')
               ->where('id', $id)
               ->first();
   }

   public static function add_connection($id) {

    DB::table('connection')->insert(
        ['sender_id' => Auth::user()->id, 
        'receiver_id' => $id,
        'status' => 0,
        'time' => time()]
    );

   }
}
