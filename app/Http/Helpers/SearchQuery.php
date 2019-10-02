<?php

namespace App\Http\Helpers;

class SearchQuery{
    public static function per_page($per_page = 10){
        if(isset($_GET['per_page'])){
            if(!empty($_GET['per_page'])){
                $per_page = $_GET['per_page'];
                if($per_page == -1){
                    $per_page = 999999999;
                }
            }
        }
        return $per_page;
    }

    public static function filter($model,$array,$sign = "="){
    
        if(isset($_GET['search'])){
            if(!empty($_GET['search'])){
                $i = 1;
                $value = $_GET['search'];
                if($sign == 'like'){
                    $value = '%' . $_GET['search'] . '%';
                }
                foreach($array as $arr){
                    if($i == 1){
                        $model->where($arr,$sign,$value);
                    }else{
                        $model->orWhere($arr,$sign,$value);
                    }
                    $i++;
                }
            }
        }
        return $model;
    }
}