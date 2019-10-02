<?php
 namespace App\Http\Helpers;
 use Illuminate\Support\Str;
 use Carbon\Carbon;
 use Illuminate\Http\Request;
 use App\Http\Helper\VroomImage;
use Illuminate\Support\Facades\Storage;

class FileUploadHelper{
 /**
     * @var $request http request
     * @var $name the name of the request key having the uploaded value
     * @var $location public place where value can be placed
     * @var $file_name the default value where there is no data can be uploaded
     */
    public static function upload(Request $request,$name,$location,$file_name = "avatar.png",$type="noraml"){
        $file = $request->file($name);
        if(is_array($file)){
            if(count($file) > 0){
                if($file[0]->isValid()){
                    $file_name = FileUploadHelper::file_upload($file[0],0,$location,$type);
                }
            }
        }else{
            if($file)
            if($file->isValid()){
                $file_name = FileUploadHelper::file_upload($file,$location,0,$type);
            }
        }
        return $file_name;
    }

    public static function file_upload($file,$location,$i = 0,$type="normal"){
        $extention = $file->getClientOriginalExtension();
        $file_name = Carbon::now()->format('YmdHis')."PIC$i".".".$extention;
        //$file->storeAs($location,$file_name);
        Storage::disk('public')->putFileAs($location,$file,$file_name);
        $file_name = "$location/".$file_name;
        return $file_name;
    }

    public static function upload_many($files,$location,$type="noraml"){
        $names = [];
        if(is_array($files)){
            $i = 0;
            foreach($files as $file){
                if($file->isValid()){
                    $names[] = FileUploadHelper::file_upload($file,$location,$i++,$type);
                }
            }
        }else{
            if($files) 
            if($files->isValid()){
                $names[] = FileUploadHelper::file_upload($files,$location,0,$type);
            }
        }
        return $names;
    }
}