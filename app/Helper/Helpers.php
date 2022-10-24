<?php

use Illuminate\Support\Facades\DB;


if (!function_exists('isSuccessResponse')) {
    function isSuccessResponse($response)
    {
        if (!empty($response)) {
            if (isset($response['status']) && $response['status'] == 'success') {
                return true;
            } elseif (isset($response['status']) && $response['status'] == 'error') {
                return false;
            }
        }
        return false;
    }
}

    function fileExit($path) {
        if($path){
            $ppath = public_path($path);
            if(file_exists($ppath)){
              return asset($path);
            } else {
                return asset('assets/images/no-photo.png');
           }
        }else{
            return asset('assets/images/no-photo.png');
        }
    }

    function fileExit1($path) {
        if($path){
            $ppath = public_path($path);
            if(file_exists($ppath)){
              return asset($path);
            } else {
                return asset('uploads/profile/default.png');
           }
        }else{
            return asset('uploads/profile/default.png');
        }

    }

    function settings(){
        return DB::table('web_settings')->first();
    }
