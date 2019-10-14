<?php

namespace Modules\Setting\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setting\Entities\Setting;

class ApiSettingController extends Controller
{
    public function __invoke()
    {
        return $siteSetting = Setting::all();
        
    }
}
