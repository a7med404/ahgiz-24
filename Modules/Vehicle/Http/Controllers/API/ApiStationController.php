<?php

namespace Modules\Vehicle\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Vehicle\Entities\Station;
use Modules\Vehicle\Transformers\StationResource;
use Illuminate\Routing\Controller;
use Modules\Vehicle\Transformers\PlaneStationResource;

class ApiStationController extends Controller
{
<<<<<<< HEAD
 public function getStation(){
    return StationResource::collection(Station::orderBy('id')->where('status', 1)->get());
 }
=======

 public function getBusStation(){
    return StationResource::collection(Station::orderBy('id')->where('status', 1)->where('type', 0)->get()); 
 }   
>>>>>>> 6c1a0e68ed2e072ff2eda2a0e51e989d0a33a394

 # get plane stations 
 public function getPlaneStation(){
<<<<<<< HEAD

<<<<<<< HEAD
   $planeStations = Station::where('type',1)->get();
=======
   $planeStations = Station::orderBy('id')->where('status', 1)->where('type', 1)->get();
>>>>>>> 6c1a0e68ed2e072ff2eda2a0e51e989d0a33a394
   return PlaneStationResource::collection($planeStations);
=======
    return PlaneStationResource::collection(Station::orderBy('id')->where('status', 1)->where('type', 1)->get());
>>>>>>> 84d175c7ca9710f74c293205bef0beda446c306a
 }

}
