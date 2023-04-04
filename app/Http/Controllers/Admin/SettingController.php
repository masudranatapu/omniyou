<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebSetting;

class SettingController extends Controller
{
    public $setting;

    public function __construct(WebSetting $setting)
    {
        $this->setting = $setting;
    }

    public function webSetting()
    {
        $setting = WebSetting::first();
        return view('admin.setting.setting')->with(compact('setting'));;
    }

    public function webUpdate(Request $request)
    {
        $setting = $this->setting->settingUpdae($request);

        if(!$setting->status) {

            $notification = array(
                'messege' => $setting->msg,
                'alert-type' => 'error'
            );
            return Redirect()->route($setting->redirect_to)->with($notification);
        }

        $notification = array(
            'messege' => $setting->msg,
            'alert-type' => 'success'
        );

        // dd($notification);

        return Redirect()->route($setting->redirect_to)->with($notification);

    }
}
