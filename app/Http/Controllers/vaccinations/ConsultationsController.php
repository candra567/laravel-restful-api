<?php

namespace App\Http\Controllers\vaccinations;

use App\Http\Controllers\Controller;
use App\Models\Consultations;
use App\Models\Hospital;
use App\Models\Officer;
use App\Models\UsersVaksin;
use Illuminate\Http\Request;

class ConsultationsController extends Controller
{
    protected $data_user='';
    public function users()
    {
        return UsersVaksin::user()->where('id_card_users_vaksin',session()->get('id'))->first();
    }
    public function index(){
        return view('vaccins.consultations');
    }
    public function save(Request $request){
        $data_officer=Officer::officer()->Where('regionals_officer',$this->users()->regionals_users_vaksin)->first();
        $first_consultations=Consultations::consultations()->where('users_consultations',$this->users()->id_users_vaksin)->where('number_consultations',1)->first();
        $seconds_consultations=Consultations::consultations()->where('users_consultations',$this->users()->id_users_vaksin)->where('number_consultations',2)->first();
        if(empty($first_consultations)){
          Consultations::create([
            'users_consultations'=>$this->users()->id_users_vaksin,
            'disease_history'=>$request->disease_history,
            'current_symptoms'=>$request->current_symptoms,
            'officer_consultations'=>$data_officer->id_officer,
            'number_consultations'=>1
          ]);
          return redirect('/home');
        }
        elseif(empty($seconds_consultations)){
            Consultations::create([
                'users_consultations'=>$this->users()->id_users_vaksin,
                'disease_history'=>$request->disease_history,
                'current_symptoms'=>$request->current_symptoms,
                'officer_consultations'=>$data_officer->id_officer,
                'number_consultations'=>2
              ]);
              return redirect('/home');
        }
        else{
            return redirect('/home');
        }
    }
}
