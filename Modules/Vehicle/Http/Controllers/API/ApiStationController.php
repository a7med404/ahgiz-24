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

 public function getBusStation(){
    return StationResource::collection(Station::orderBy('id')->where('status', 1)->where('type', 0)->get());
 }

 # get plane stations
 public function getPlaneStation(){
    return PlaneStationResource::collection(Station::orderBy('id')->where('status', 1)->where('type', 1)->get());
 }

}
