<?php

namespace Modules\Setting\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Company\Entities\Company;
use Modules\Company\Transformers\PlaneCompanyResource;
use Modules\Setting\Entities\Setting;
use Modules\Setting\Transformers\SettingResource;
use Modules\Vehicle\Entities\Station;
use Modules\Vehicle\Transformers\PlaneStationResource;
use \DB;

class ApiSettingController extends Controller
{
    public function __invoke()
    {
        $busStations = PlaneStationResource::collection(Station::where('type', 0)->get());
        $planeStations = PlaneStationResource::collection(Station::where('type', 1)->get());
        $planeCompany = PlaneCompanyResource::collection(Company::where('type', 1)->get());
        $siteSetting = \DB::table('settings')->select('name_setting', 'value')->get();
        $settings = [];
        foreach ($siteSetting as $key => $item) {
            $settings[$item->name_setting] = $item->value;
        }
        return [ 
            'bus_stations' => $busStations,
            'plane_stations' => $planeStations,
            'plane_company' => $planeCompany,
            'settings' => $settings
        ];
    }
}
