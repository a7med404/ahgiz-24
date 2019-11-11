<?php

namespace Modules\Company\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Company \Entities\Company;
use Modules\Company\Transformers\PlaneCompanyResource;

class ApiCompanyController extends Controller
{
    // get the plane companies //
    public function planecompany(){
        return PlaneCompanyResource::collection(Company::where('type',1)->get());
     }      

}
