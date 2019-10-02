<?php
 namespace App\Http\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class DatabaseHelper{
    protected static $is_transaction = false;
    protected static $db_errors = array(
        ["doesn't have a default","Field does not have default value"],
        ['duplicate key', 'Unique Column Dublicated'],
        ['Duplicate', 'Unique Column Dublicated'],
        ['truncated for column','Column is small to handle such a string'],
        ['Unknown column','column not found'],
        ['cannot be null',"Column can not be null"],
        ['Array to string conversion',"Can't insert array to string column"],
        ['Cannot add or update a child row',"Relationship intergrity error"],
    );

    protected static $db_errors_auth = array(
        ["doesn't have a default","You must fill"],
        ['duplicate key', 'Username or email alredy taken'],
        ['Duplicate', 'Username or email alredy taken'],
        ['truncated for column','Value is too large to handle'],
        ['Unknown column','Invilid column name'],
        ['cannot be null',"Column can not be null"],
        ['Array to string conversion',"Can't insert array to string column"],
        ['Cannot add or update a child row',"Relationship intergrity error"]
    );

    public static function check_existance($request,$fields = array(),$class){
        $results = array(false,"");
        $error = "";
        $not_found_error = "";
        $success = false;
        $not_found = false;
        foreach($fields as $key => $value){
            try{
                if(DB::table($class)->where($value,$request->$key)->count()){
                    //return "exists"; This return goes with the commented function validator_unique
                    $success = true;
                    $error .= " $key, ";
                }
            }catch(QueryException $e){
                //return "not_found"; This return goes with the commented function validator_unique
                $not_found = true;
                $not_found_error .= " $value, ";
            }
        }

        if($not_found){
            return array($not_found,$not_found_error . " column(s) not found");
        }
        if($success){
            return array($success,$error . " alread taken");
        }
        return $results;
    }

    public static function validate($request,$fields = array()){
        $error = DatabaseHelper::validator($request,$fields,'required');
        if($error[0]){
            return array(true,ResponseHelper::response(false,501,$error[1] . " required"));
        } 
        $error = DatabaseHelper::validator($request,$fields,'email');
        if($error[0]){
            return array(true,ResponseHelper::response(false,501,$error[1] . " not valid email"));
        } 
    }

    protected static function validator($request,$fields = array(),$valid){
        $error = "";
        $success = false;
        foreach($fields as $key => $value){
            if(is_array($value)){
                foreach($value as $v){
                    if($v == $valid && $valid == "required"){
                        if($request->$key == null || $request->$key == ""){
                            $success = true;
                            $error .= " $key,"; 
                        }
                    }
                    if($v == $valid && $valid == "email"){
                        if(!filter_var($request->$key, FILTER_VALIDATE_EMAIL)){
                            $success = true;
                            $error .= " $key,"; 
                        }
                    }
                }
            }
        }
        return array($success,$error);
    }


    /**
     * Hemedi Mshamu Manyinja
     * 13 /07/ 2019  2:18
     * I want to validate the uniquenes of from input
     * 
     */
    protected static function validator_unique($request,$fields = array(),$valid = "unique"){
        $error = "";
        $not_found_error = "";
        $success = false;
        $not_found = false;
        $uniques = array();
        $un = true;
        $uni_table = true;
        foreach($fields as $key => $value){
            if(is_array($value)){
                foreach($value as $v){
                    if(Str::contains($valid,$v)){
                        if($v == "unique"){
                            $uni = explode(':',$v);
                            if(array_key_exists(2,$uni)){
                                $column = $uni[2];
                            }else{
                                $column = $uni[0];
                            }
                            $uniques[] = [$key => $column];
                            $check = DatabaseHelper::check_existance($request,$uniques,$uni[1]);
                            if($check[0]){
                                if($check[1] == "exists"){
                                    $success = true;
                                    $error .= " $key,";
                                }
                                if($check[1] == "not_found"){
                                    $not_found = true;
                                    $not_found_error .= " $key,";
                                }
                            }
                        }
                    }
                }
            }
        }
        return array($success,$error);
    }

    public static function query_error($callback, $attempt = null,$auth = false){
        try{
            ///Check if query received if of traction or norma query!!
            if(DatabaseHelper::$is_transaction){
                return DB::transaction($callback,$attempt);
            }
            return $callback();
        }catch(QueryException $e){
            $sms = $e->getMessage();
            $errors = $auth ? DatabaseHelper::$db_errors_auth : DatabaseHelper::$db_errors;
            foreach($errors as $error){
                if(Str::contains($e->getMessage(),$error[0])){
                    $sms = $error[1];
                }
            }
            return ResponseHelper::response(false,501,$sms,array(),0);
        }
    }

    public static function transaction($callback, $attempt = 1){
        DatabaseHelper::$is_transaction = true;
        return DatabaseHelper::query_error($callback,$attempt);
    }

    public static function update_error($updated,$response = null){
        if($updated){
            return ResponseHelper::response(false,200,"Updated Successfully!!",$response,0);
        }else{
            return ResponseHelper::response(false,301,"failed to update",$response,0);
        }
    }

    public static function creating_error($created,$response = null){
        if($created->wasRecentlyCreated){
            if($response != null){$created = $response;}
            return ResponseHelper::response(true,200,"Created Successfully!!",$created,0);
        }else{
            return ResponseHelper::response(false,301,"failed to create",$created,0);
        }
    }

    public static function not_found_error($id = null){
        if($id == null){$id = "";}
        return ResponseHelper::response(false,401,"$id not found!!",null,0);
    }

    public static function selection($collection,$count = null){
        if(count($collection)){
            return ResponseHelper::response(true,"fine",200,$collection,$count);
        }else{
            return ResponseHelper::response(false,"no data",401,null);
        }
    }


    ///This help to get all data from database is -1 or string is setted to per page
    // Remember to update this on Model in case of updates
    public static function per_page_helper($perPage){
        if(isset($_GET['per_page'])){
            if(!empty($_GET['per_page'])){
                $per_page = $_GET['per_page'];
                if(is_numeric($per_page)){
                    if($per_page > 0){
                        return $per_page;
                    }else{
                        return 999999999;
                    }
                }else if($per_page == 'all'){
                    return 999999999;
                }else{
                    return 0;
                }
            }
        }
        
        if(is_numeric($perPage)){
            if($perPage > 0){
                return $perPage;
            }else{
                return 999999999;
            }
        }
    }
 }