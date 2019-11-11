<?php

namespace Modules\Address\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Address\Entities\City;
use Modules\Address\Transformers\cityResource;

class ApiCityController extends Controller
{
    public function cities()
    {
        return cityResource::collection(City::orderBy('id')->get());
    }

    public function mainCities()
    {
        $cityInfoForDelete = City::orderBy('id')->where('parent_id', null)->get();
        $cityInfoForDelete->delete();
        Session::flash('flash_massage_type', 2);
        return redirect()->back()->withFlashMassage('City Deleted Successfully');
    }
    
    public function subCities($id)
    {
        $cityInfoForDelete = City::findOrFail($id);
        $cityInfoForDelete->delete();
        Session::flash('flash_massage_type', 2);
        return redirect()->back()->withFlashMassage('City Deleted Successfully');
    }
}
