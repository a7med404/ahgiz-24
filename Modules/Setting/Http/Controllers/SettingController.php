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
        
        if ($request->has('password')) {
          $password  = $request->password;
          if (Hash::check($password, auth()->user()->password)) {
            foreach (array_except($request->toArray(), ['password', 'submit', '_token']) as $key => $req) {
              $updateSetting = $siteSetting->where('name_setting', $key)->get()[0];
              $u = $updateSetting->fill(['value' => $req])->save();
            }
            Session::flash('flash_massage_type');
            return redirect()->back()->withFlashMassage('Setting Saved Successfully');
            
          } else {
            Session::flash('flash_massage_type', 4);
            return redirect()->back()->withFlashMassage('Password Not Right');
          }
        }
      }

}
