<?php

namespace App\Http\Redirect;
class RedirectHelper
{
    //
    public static function back_error($sms, $header, $type){
        return redirect()->back()->withErrors(['sms' => $sms, 'heading' => $header, 'type' => $type]);
    }

    public static function back(){
        return redirect()->back();
    }

    public static function link($link){
        return redirect()->route($link);
    }

    public static function link_error($link, $sms, $header, $type){
        return redirect()->route($link)->withErrors(['sms' => $sms, 'heading' => $header, 'type' => $type]);
    }

    public static function valid($validator){
        return redirect()->back()->withErrors($validator);
    }

    public static function valid_link($link, $validator){
        return redirect()->route($link)->withErrors($validator);
    }

    public static function not_found($id = ""){
        return Redirect::back_error("$id Not found","Not found!!","danger");
    }
}
