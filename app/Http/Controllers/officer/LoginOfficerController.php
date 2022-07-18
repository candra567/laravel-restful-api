<?php

namespace App\Http\Controllers\officer;

use App\Http\Controllers\Controller;
use App\Models\Officer;
use Illuminate\Http\Request;

class LoginOfficerController extends Controller
{
    public function index(){
        return view('officer.login');
    }
    public function save(Request $request){
        $data_officer=Officer::where('id_card_officer',$request->id_card_officer)->first();
        if (empty($data_officer)) {
            return back()->with('loginfailed','Id card belum terdaftar');
        }
        else{
               if (password_verify($request->password_officer,$data_officer->password_officer)) {
                  session([
                    'login'=>true,
                    'id'=>$data_officer->id_card_officer,
                    'name'=>$data_officer->name_officer,
                    'admin'=>true
                  ]);
                   return redirect('/dashboard');
               }
               else{
                 return back()->with('loginfailed','Kata sandi salah')->withInput();
               }
        }
    }
}
