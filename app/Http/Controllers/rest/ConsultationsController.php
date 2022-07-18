<?php

namespace App\Http\Controllers\rest;

use App\Http\Controllers\Controller;
use App\Models\Consultations;
use App\Models\Officer;
use Exception;
use Illuminate\Http\Request;
use App\Models\UsersVaksin;
class ConsultationsController extends Controller
{
    public function firstregister(Request $request,$token){
        try{
            $data_users=UsersVaksin::user()->where('login_tokens_users',$token)->first();
            $officer=Officer::officer()->where('regionals_officer',$data_users->regionals_users_vaksin)->first();
            Consultations::create([
                'users_consultations'=>$data_users->id_users_vaksin,
                'disease_history'=>$request->disease_history,
                'current_symptoms'=>$request->current_symptoms,
                'officer_consultations'=>$officer->id_officer,
                'number_consultations'=>1
            ]);
            return response()->json([
              'message'=>'Send first consultan success'
            ]);
        }
        catch(Exception $e){
            return response()->json([
              'message'=>$e->getMessage()
            ]);
        }
    }
    public function secondsregister(Request $request,$token){
          try{
              $data_users=UsersVaksin::user()->where('login_tokens_users',$token)->first();
              $officer=Officer::officer()->where('regionals_officer',$data_users->regionals_users_vaksin)->first();
              Consultations::create([
                  'users_consultations'=>$data_users->id_users_vaksin,
                  'disease_history'=>$request->disease_history,
                  'current_symptoms'=>$request->current_symptoms,
                  'officer_consultations'=>$officer->id_officer,
                  'number_consultations'=>2
              ]);
              return response()->json([
                'message'=>'Send seconds consultan success'
              ]);
          }
          catch(Exception $e){
              return response()->json([
                'message'=>$e->getMessage()
              ]);
          }
    }
    public function firstconsultations($token){
              try{
                $data_users=UsersVaksin::user()->where('login_tokens_users',$token)->first();
                $data_consultations=Consultations::allData()->where('users_consultations',$data_users->id_users_vaksin)->where('number_consultations',1)->orderBy('id_consultations','desc')->first();
                if(empty($data_consultations)){
                   return response()->json([
                     'message'=>'Empty result',
                     'data'=>[]
                   ]);
                }
                return response()->json([
                    'message'=>'Result',
                    'data'=>[
                      $data_consultations
                    ]
                ]);
              }
              catch(Exception $e){
                   return response()->json([
                      'message'=>$e->getMessage()
                   ]);
              }
    }
    public function secondsconsultations($token){
        try{
            $data_users=UsersVaksin::user()->where('login_tokens_users',$token)->first();
            $data_consultations=Consultations::allData()->where('users_consultations',$data_users->id_users_vaksin)->where('number_consultations',2)->orderBy('id_consultations','desc')->first();
            if(empty($data_consultations)){
              return response()->json([
                'message'=>'Empty result',
                'data'=>[]
              ]);
           }
            return response()->json([
                'message'=>'Result',
                'data'=>[
                  $data_consultations
                ]
            ]);
          }
          catch(Exception $e){
               return response()->json([
                  'message'=>$e->getMessage()
               ]);
          }
    }
}
