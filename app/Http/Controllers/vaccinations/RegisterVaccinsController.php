<?php

namespace App\Http\Controllers\vaccinations;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use App\Models\RegisterVaccins;
use App\Models\SpotsVaccins;
use App\Models\UsersVaksin;
use Illuminate\Http\Request;

class RegisterVaccinsController extends Controller
{
    public function index(Request $request){
        $data=[
          'spots'=>Hospital::hospital()->where('id_hospital',$request->id_spots_vaccins)->first()
        ];
        return view('vaccins.registervaccins',$data);
    }
    public function save(Request $request){
        $date=$request->date;
        ($date==null) ? $date=date('Y-m-d') :"";
        $data_users=UsersVaksin::where('id_card_users_vaksin',session('id'))->first();
        $first_vaccinations=RegisterVaccins::vaccins()->where('id_users_vaksin',$data_users->id_users_vaksin)->where('dose_vaccinations',1)->first();
        $seconds_vaccinations=RegisterVaccins::vaccins()->where('id_users_vaksin',$data_users->id_users_vaksin)->where('dose_vaccinations',2)->first();
        if (empty($first_vaccinations)) {
          RegisterVaccins::insert([
            'users_vaccinations'=>$data_users->id_users_vaksin,
            'dose_vaccinations'=>1,
            'date_vaccinations'=>$date,
            'locations_vaccins'=>$request->id_hospital
          ]);
          return redirect('/home');
        } elseif(empty($seconds_vaccinations)) {
          RegisterVaccins::insert([
            'users_vaccinations'=>$data_users->id_users_vaksin,
            'dose_vaccinations'=>2,
            'date_vaccinations'=>$date,
            'locations_vaccins'=>$request->id_hospital
          ]);
          return redirect('/home');
        }
        else{
          return redirect('/home');
        }
        
      }
}
