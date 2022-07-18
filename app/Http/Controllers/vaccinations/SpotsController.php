<?php

namespace App\Http\Controllers\vaccinations;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use App\Models\SpotsVaccins;
use App\Models\UsersVaksin;
use Illuminate\Http\Request;

class SpotsController extends Controller
{
    public function index(){
        $data_users=UsersVaksin::user()->where('id_card_users_vaksin',session('id'))->first();
        $data_spots=Hospital::hospital()->where('id_regionals',$data_users->regionals_users_vaksin)->get();
        return view('vaccins.spots',[
            'spots'=>$data_spots
        ]);
        
    }
}
