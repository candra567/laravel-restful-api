<?php

namespace App\Http\Controllers\rest;

use App\Http\Controllers\Controller;
use App\Models\RegisterVaccins;
use App\Models\UsersVaksin;
use Exception;
use Illuminate\Http\Request;
class VaccinationsController extends Controller
{
    public function firstregister(Request $request,$token){
        $request->validate([
            'date_vaccinations'=>'required',
            'locations_vaccins'=>'required'
        ]);
        try{
            $data_users=UsersVaksin::user()->where('login_tokens_users',$token)->first();
            RegisterVaccins::insert([
                'users_vaccinations'=>$data_users->id_users_vaksin,
                'dose_vaccinations'=>1,
                'date_vaccinations'=>$request->date_vaccinations,
                'locations_vaccins'=>$request->locations_vaccins
            ]);
            return response()->json([
               'message'=>'Register success'
            ]);
        }
        catch(Exception $e){
            return response()->json([
                'message'=>$e->getMessage()
             ]);
        }
    }
    public function secondsregister(Request $request,$token){
        $request->validate([
            'date_vaccinations'=>'required',
            'locations_vaccins'=>'required'
        ]);
        try{
            $data_users=UsersVaksin::user()->where('login_tokens_users',$token)->first();
            RegisterVaccins::insert([
                'users_vaccinations'=>$data_users->id_users_vaksin,
                'dose_vaccinations'=>2,
                'date_vaccinations'=>$request->date_vaccinations,
                'locations_vaccins'=>$request->locations_vaccins
            ]);
            return response()->json([
               'message'=>'Register success'
            ]);
        }
        catch(Exception $e){
            return response()->json([
                'message'=>$e->getMessage()
             ]);
        }
    }
    public function firstvaccinations($token){
       try{
        $data_vaccins=RegisterVaccins::vaccins()->where('login_tokens_users',$token)->where('dose_vaccinations',1)->orderBy('id_vaccinations','desc')->first();
        if(empty($data_vaccins)){
            return response()->json([
                'message'=>'Result',
                'data'=>[]
             ]);
        }
        return response()->json([
            'message'=>'Result',
            'data'=>[$data_vaccins]
         ]);
       }
       catch(Exception $e){
        return response()->json([
            'message'=>$e->getMessage()
         ]);
       }
    }
    public function secondsvaccinations($token){
        try{
         $data_vaccins=RegisterVaccins::vaccins()->where('login_tokens_users',$token)->where('dose_vaccinations',2)->orderBy('id_vaccinations','desc')->first();
         if(empty($data_vaccins)){
            return response()->json([
                'message'=>'Result',
                'data'=>[]
             ]);
        }
        return response()->json([
            'message'=>'Result',
            'data'=>[$data_vaccins]
         ]);
        }
        catch(Exception $e){
         return response()->json([
             'message'=>$e->getMessage()
          ]);
        }
     }
}
