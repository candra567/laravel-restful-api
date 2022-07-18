<?php

namespace App\Http\Controllers\rest;

use App\Http\Controllers\Controller;
use App\Models\UsersVaksin;
use Exception;
use Illuminate\Http\Request;

class LoginController extends Controller
{
   public function login(Request $request):object{
      $request->validate([
         'id_card_users'=>'required',
         'password_users'=>'required'
      ]);
      try{
         $data_users=UsersVaksin::user()->where('id_card_users_vaksin',$request->id_card_users)->first();
         if (empty($data_users)) {
            return response()->json([
                'message'=>'Id card belum terdaftar'
             ],401);
         }
         else{
              if (password_verify($request->password_users,$data_users->password_users_vaksin)) {
               $login_tokens=md5($data_users->id_card_users_vaksin);
               $data_users->login_tokens_users=$login_tokens;
               $data_users->save();
               return response()->json([
                  'message'=>'Login success',
                  'data'=>[
                     'name_users'=>$data_users->name_users_vaksin,
                     'gender_users'=>$data_users->gender_users_vaksin,
                     'born_date_users'=>$data_users->born_date_users_vaksin,
                     'regionals_users'=>$data_users->name_regionals,
                     'login_tokens'=>$login_tokens
                  ]
               ]);
              } else {
                return response()->json([
                    'message'=>'Password failed'
                 ],401);
              }
              
         }
      }
      catch(Exception $e){
        return response()->json([
           'message'=>$e->getMessage()
        ]);
      }
   }
    /**
     * logout
     */
    public function logout(string $token){
      try{
         $data_users=UsersVaksin::user()->where('login_tokens_users',$token)->first();
         $data_users->login_tokens_users=null;
         $data_users->save();
         return response()->json([
           'message'=>'Logout berhasil'
         ]);
      }
      catch(Exception $e){
         return response()->json([
            'message'=>$e->getMessage()
         ]);
      }
    }
}
