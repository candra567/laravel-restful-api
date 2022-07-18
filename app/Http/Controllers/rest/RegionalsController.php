<?php

namespace App\Http\Controllers\rest;

use App\Http\Controllers\Controller;
use App\Models\Regionals;
use Exception;
use Illuminate\Http\Request;

class RegionalsController extends Controller
{
    public function index(){
        try
        {
          $data_regionals=Regionals::all();
          return response()->json([
             'message'=>'Request success',
             'data'=>$data_regionals
          ]);
        }
        catch(Exception $e)
        {
           return response()->json([
             'message'=>$e->getMessage()
           ]);
        }
    }
}
