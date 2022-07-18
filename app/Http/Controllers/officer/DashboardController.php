<?php

namespace App\Http\Controllers\officer;

use App\Http\Controllers\Controller;
use App\Models\Consultations;
use App\Models\Officer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data_officer=Officer::officer()->where('id_card_officer',session('id'))->first();
        $data_consultan=Consultations::consultations()->where('regionals_users_vaksin',$data_officer->regionals_officer)->get();
        $data=[
          'consultations'=>$data_consultan
        ];
        return view('officer.home',$data);
    }
    public function update(Request $request){
        $data_consultan=Consultations::where('id_consultations',$request->id_consultations)->update(['status_consultations'=>'accepted']);
        return redirect('/dashboard');
    }
}
