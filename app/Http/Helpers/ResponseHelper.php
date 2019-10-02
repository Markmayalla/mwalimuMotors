<?php
    namespace App\Http\Helpers;

use Carbon\Carbon;

class ResponseHelper{
        public static function response($status = false,$code = "",$sms = "",$data = array(),$count =""){
            // if(is_object($data)){
            //     if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            //         $count = $data->total();
            //     }
            // }else{
            //     $count = 0;
            // }
            if($data == null){
                $data = array();
            }

            return response()->json(compact('status','sms','code','data','count'),200,[],JSON_PRETTY_PRINT)->header('Access-Control-Allow-Origin', '*')->header('Content-Type','application/json');
        }
        public static function response_token($token="",$status = false,$sms = "",$code = "",$data = ""){
            return response()->json(compact('status','sms','code','data','token'))->header('Access-Control-Allow-Origin', '*')->header('Content-Type','application/json');
        }

        public static function request_selecom( $url,
                                                $order_id,
                                                $amount,
                                                $payer_email,
                                                $payer_phone,
                                                $payer_remarks,
                                                $merchant_remarks = "Vroom",
                                                $currency = "TZS",
                                                $action = "create"
                                                ){
            $api_secret = env('SELECOM_SECRETE');
            $timestamp = Carbon::now()->format('Y-m-d H:i:s');
            $api_key = env('SELECOM_KEY');
            $digest = function() use($api_secret,$timestamp,$api_key){
                return md5($timestamp . $api_secret) . sha1(sha1($timestamp . $api_key . $api_secret, true));
            };
            $back =  function(){
                return false;
            };
            $headers = [
                'Content-Type','application/json',
                'API_KEY',$api_key,
                'digest',$digest(),
                'request_timestamp',$timestamp
            ];
            if($action == "create"){  
                $request = json_encode(compact('order_id','amount','payer_email','payer_phone','payer_remarks','merchant_remarks','currency'));
                $back = function() use($url,$request,$headers){
                    $ch = curl_init();
                    curl_setopt($ch,CURLOPT_URL,$url);
                    curl_setopt($ch,CURLOPT_HTTPAUTH,CURLAUTH_ANY);
                    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
                    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
                    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                    curl_setopt($ch,CURLOPT_SSLVERSION,1);
                    curl_setopt($ch,CURLOPT_POSTFIELDS,$request);
                    curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
                    $response = curl_exec($ch);
                    curl_close($ch);
                    return $response;
                };
            }

            if($action == "status"){
                $back = function() use($url,$headers){
                    $ch = curl_init();
                    curl_setopt($ch,CURLOPT_URL,$url);
                    curl_setopt($ch,CURLOPT_HTTPAUTH,CURLAUTH_ANY);
                    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
                    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
                    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                    curl_setopt($ch,CURLOPT_SSLVERSION,1);
                    //curl_setopt($ch,CURLOPT_POSTFIELDS,$request);
                    curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
                    $response = curl_exec($ch);
                    curl_close($ch);
                    return $response;
                }; 
            }
            return $back();
        }
    }