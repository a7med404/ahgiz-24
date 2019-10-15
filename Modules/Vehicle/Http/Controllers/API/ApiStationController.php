<?php

namespace Modules\Vehicle\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Vehicle\Entities\Station;
use Modules\Vehicle\Transformers\StationResource;
use Illuminate\Routing\Controller;

class ApiStationController extends Controller
{
 public function getStation(){
    return StationResource::collection(Station::orderBy('id')->where('status', 1)->get()); 
 }   

 // get plane stations //
 public function planestation(){

   $planeStations = Station::where('type','=',1)->get();
   return response()->json($planeStations,200);
 }
}
