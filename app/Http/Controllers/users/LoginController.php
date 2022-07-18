<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\UsersVaksin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function login(Request $request){
        $data_users=UsersVaksin::where('id_card_users_vaksin',$request->id_card_users)->first();
        if (empty($data_users)) {
            return back()->with('loginfailed','Id card belum terdaftar');
        }
        else{
               if (password_verify($request->password_users,$data_users->password_users_vaksin)) {
                  session([
                    'login'=>true,
                    'id'=>$data_users->id_card_users_vaksin,
                    'name'=>$data_users->name_users_vaksin
                  ]);
                   return redirect('/home');
               }
               else{
                 return back()->with('loginfailed','Kata sandi salah')->withInput();
               }
        }
    }
    public function logout(Request $request){
        if ($request->method('POST')) {
            session()->flush();
            return redirect('/');
        }
        return back();
    }
}
