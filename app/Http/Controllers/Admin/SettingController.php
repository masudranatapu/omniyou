<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebSetting;
use Image;
class SettingController extends Controller
{
    public function webSetting()
        {
           $setting=WebSetting::first();
            return view('admin.setting.setting')->with(compact('setting'));;
        }


        public function webUpdate(Request $request){
            $setting= WebSetting::find(1);
            $setting->site_name=$request->site_name;
            $setting->address=$request->address;
            $setting->meta_title=$request->meta_title;
            $setting->meta_keyword=$request->meta_keyword;
            $setting->meta_description=$request->meta_description;
            $setting->terms_service=$request->terms_service;
            $setting->privacy_policy=$request->privacy_policy;


            $file = $request->file('application_logo');
            if ($file) {
                $name = time() . '.' . $file->getClientOriginalExtension();
                $path = 'uploads/logo/';
                $file->move($path, $name);
                $setting->application_logo = $path . $name;
            }

            $file = $request->file('favicon');
            if ($file) {
                $name = time() . '.' . $file->getClientOriginalExtension();
                $path = 'uploads/favicon/';
                $file->move($path, $name);
                $setting->favicon = $path . $name;
            }

            $file = $request->file('og_logo');
            if ($file) {
                $name = time() . '.' . $file->getClientOriginalExtension();
                $path = 'uploads/og_logo/';
                $file->move($path, $name);
                $setting->og_logo = $path . $name;
            }


              $setting->save();

              $notification=array(
                'messege'=>'WebSetting Update Successfully',
                'alert-type'=>'success'
                 );

            return Redirect()->back()->with($notification);
        }
}
