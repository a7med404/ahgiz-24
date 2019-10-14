<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setting\Entities\AppSetting;
use Modules\Setting\Transformers\AppSettingResource;

class AppSettingController extends Controller
{
    public function index(AppSetting $appSetting){
        $appSetting = $appSetting->first();
        return AppSettingResource::collection($appSetting);
        return view('setting::settings.index', ['appSetting' => $appSetting]);
      }
    
      public function store(Request $request, AppSetting $appSetting){
        // dd($request->file($appSetting->name_setting));
        foreach (array_except($request->toArray(), ['submit', '_token']) as $key => $req) {
            $updateSetting = $appSetting->where('name_setting', $key)->get()[0];
            $u = $updateSetting->fill(['value' => $req])->save();
        }
        Session::flash('flash_massage_type');
        return redirect()->back()->withFlashMassage('AppSetting Saved Successfully');
      }
}
