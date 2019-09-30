<?php

namespace Modules\Setting\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setting\Transformers\AppSettingResource;
use Modules\Setting\Entities\AppSetting;


class ApiAppSettingController extends Controller
{
   public function __invoke(AppSetting $appSetting)
    {
        $appSetting = $appSetting->first();
        return new AppSettingResource($appSetting);
    }
    
}
