<?php

namespace App\Http\Controllers\rest;

use App\Http\Controllers\Controller;
use App\Models\UsersVaksin;
use Exception;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request){
      $request->validate([
        'id_card_users'=>'required',
        'name_users'=>'required',
        'password_users'=>'required',
        'gender_users'=>'required',
        'born_date_users'=>'required',
        'regionals_users'=>'required'
      ]);
       try
       {
        $id_card_users=$request->id_card_users;
        $name_users=$request->name_users;
        $password_users=password_hash($request->password_users,PASSWORD_DEFAULT);
        $gender_users=$request->gender_users;
        $born_date_users=$request->born_date_users;
        $regionals_users=$request->regionals_users;
        $login_tokens='';
        $data_users=UsersVaksin::user()->where('id_card_users_vaksin',$id_card_users)->first();
         if(!empty($data_users))
         {
            return response()->json([
                'message'=>'Id card terdaftar silahkan login'
              ],401);
         }
         else
         {
           $login_tokens=md5($id_card_users);
           $create=UsersVaksin::create([
               'id_card_users_vaksin'=>$id_card_users,
               'password_users_vaksin'=>$password_users,
               'name_users_vaksin'=>$name_users,
               'gender_users_vaksin'=>$gender_users,
               'born_date_users_vaksin'=>$born_date_users,
               'regionals_users_vaksin'=>$regionals_users,
               'login_tokens_users'=>$login_tokens
            ]);
            return response()->json([
              'message'=>'Registrasi berhasil',
              'data'=>[
                'name'=>$create->name_users_vaksin,
                'gender'=>$create->gender_users_vaksin,
                'login_tokens'=>$login_tokens
              ]
            ]);
         }
       }
       catch(Exception $e)
       {
        return response()->json([
          'message'=>$e->getMessage()
        ]);
       }
    }

    public function getusers($token){
      try{
        $data_users=UsersVaksin::user()->where('login_tokens_users',$token)->first();
        if(empty($data_users)){
             return response()->json([
               'message'=>'Users not found'
             ],401);
        }
        else{
         return response()->json([
           'data'=>$data_users
         ]);
        }
      }
      catch(Exception $e){
        return response()->json([
          'message'=>$e->getMessage()
        ]);
      }
    
    }
}
