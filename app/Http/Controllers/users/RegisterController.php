<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Regionals;
use App\Models\UsersVaksin;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        $data=[
           'regionals'=>Regionals::all()
        ];
        return view('auth.register',$data);
    }
    public function register(Request $request){
        $data_users=UsersVaksin::where('id_card_users_vaksin',$request->id_card_users)->first();
        if (!empty($data_users)) {
            return back()->with('registerfailed','Id card sudah terdaftar')->withInput();
        }
        else{
            UsersVaksin::create([
                'id_card_users_vaksin'=>$request->id_card_users,
                'password_users_vaksin'=>password_hash($request->password_users,PASSWORD_DEFAULT),
                'name_users_vaksin'=>$request->name_users,
                'gender_users_vaksin'=>$request->gender_users,
                'born_date_users_vaksin'=>$request->born_date_users,
                'regionals_users_vaksin'=>$request->regionals_users
               ]);
               session([
                 'login'=>true,
                 'id'=>$request->id_card_users,
                 'name'=>$request->name_users
               ]);
               return redirect('/home');
        }
    }
}
