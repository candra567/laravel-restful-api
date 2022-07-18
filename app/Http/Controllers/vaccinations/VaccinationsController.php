<?php

namespace App\Http\Controllers\vaccinations;

use App\Http\Controllers\Controller;
use App\Models\Consultations;
use App\Models\RegisterVaccins;
use App\Models\UsersVaksin;
use Illuminate\Http\Request;

class VaccinationsController extends Controller
{
    public function index(){
        $data_users=UsersVaksin::where('id_card_users_vaksin',session('id'))->first();
        $data=[
            'first_consultations'=>Consultations::allData()->where('id_card_users_vaksin',session('id'))->where('number_consultations',1)->first(),
            'seconds_consultations'=>Consultations::allData()->where('id_card_users_vaksin',session('id'))->where('number_consultations',2)->first(),
            'first_vaccinations'=>RegisterVaccins::vaccins()->where('id_users_vaksin',$data_users->id_users_vaksin)->where('dose_vaccinations',1)->first(),
            'seconds_vaccinations'=>RegisterVaccins::vaccins()->where('id_users_vaksin',$data_users->id_users_vaksin)->where('dose_vaccinations',2)->first()
        ];
        return view('vaccins.home',$data);
    }
}
