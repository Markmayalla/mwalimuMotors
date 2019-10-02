<?php

namespace App\Http\Helpers;

use App\Http\Redirect\RedirectHelper;

class ApiWebHelper{
    public static function response($response,$view,$carriage="items",$redirect = false){
        if(!$redirect){
            if(isset($_GET['api'])){
                return DatabaseHelper::selection($response);
            }
            return view($view,$response);
        }else{
            if(!isset($_GET['api'])){
                return RedirectHelper::back_error($response[1],$view[1],$carriage[1]);
            }
            return DatabaseHelper::selection($response[0]);
        }
    }
}