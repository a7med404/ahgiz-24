<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setting\Entities\Setting;
use \Session;

class SettingController extends Controller
{
    public function index(Setting $siteSetting){
        $siteSetting = $siteSetting->all();
        // dd($siteSetting);
        return view('setting::settings.index', ['stieSetting' => $siteSetting]);
      }
    
      public function store(Request $request, Setting $siteSetting){
        // dd($request->file($siteSetting->name_setting));
        foreach (array_except($request->toArray(), ['submit', '_token']) as $key => $req) {
            $updateSetting = $siteSetting->where('name_setting', $key)->get()[0];
            $u = $updateSetting->fill(['value' => $req])->save();
        }
        Session::flash('flash_massage_type');
        return redirect()->back()->withFlashMassage('Setting Saved Successfully');
      }

}
