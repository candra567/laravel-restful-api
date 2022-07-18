<?php

namespace App\Http\Controllers\rest;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use App\Models\UsersVaksin;
use App\Models\Hospital;
class SpotsController extends Controller
{
    public function index($token){
        try{
            $data_users=UsersVaksin::user()->where('login_tokens_users',$token)->first();
            $data_spots=Hospital::hospital()->where('id_regionals',$data_users->regionals_users_vaksin)->get();
            return response()->json([
                'message'=>'Result',
                'data'=>$data_spots
             ]);
        }
        catch(Exception $e){
            return response()->json([
               'message'=>$e->getMessage()
            ]);
        }
    }
    public function show($token,$id){
        try{
            $data_spots=Hospital::hospital()->where('id_hospital',$id)->first();
            return response()->json([
              'message'=>'Result',
              'data'=>[$data_spots]
            ]);
        }
        catch(Exception $e){
            return response()->json([
              'message'=>$e->getMessage()
            ]);
        }
    }
}
