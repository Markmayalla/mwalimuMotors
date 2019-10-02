<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\models\Roles\UserRoleModel;

Route::get('/','PageController@index')->name('customer');

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/show_model', 'HomeController@index')->name('show_model');
    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::get('/show_model', 'Roles\RolesController@display_roles')->name('show_model');

    //Bus Resource
    Route::get('/car','Main\CarController@index')->name('car.index');
    Route::get('/car/{id}/edit','Main\CarController@edit')->name('car.edit');
    Route::get('/car/{id}/show','Main\CarController@edit')->name('car.show');
    Route::put('/car/{id}','Main\CarController@update')->name('car.update');
    Route::get('/car/{id}/block','Main\CarController@block')->name('car.block');
    Route::get('/car/create','Main\CarController@create')->name('car.create');
    Route::get('/car/picture/{id?}','Main\CarController@picture')->name('car.picture');
    Route::post('/car/store','Main\CarController@store')->name('car.store');

    // //Floor Resource
    // Route::get('/floor','Main\FloorController@index')->name('floor.index');
    // Route::get('/floor/{id}/edit','Main\FloorController@edit')->name('floor.edit');
    // Route::get('/floor/{id}/show','Main\FloorController@edit')->name('floor.show');
    // Route::put('/floor/{id}','Main\FloorController@update')->name('floor.update');
    // Route::get('/floor/create','Main\FloorController@create')->name('floor.create');
    // Route::post('/floor/store','Main\FloorController@store')->name('floor.store');

    //brand Resource
    Route::get('/brand','Main\BrandController@index')->name('brand.index');
    Route::get('/brand/{id}/edit','Main\BrandController@edit')->name('brand.edit');
    Route::get('/brand/{id}/show','Main\BrandController@edit')->name('brand.show');
    Route::put('/brand/{id}','Main\BrandController@update')->name('brand.update');
    Route::get('/brand/create','Main\BrandController@create')->name('brand.create');
    Route::post('/brand/store','Main\BrandController@store')->name('brand.store');

    //model Resource
    Route::get('/model','Main\ModelController@index')->name('model.index');
    Route::get('/model/{id}/edit','Main\ModelController@edit')->name('model.edit');
    Route::get('/model/{id}/show','Main\ModelController@edit')->name('model.show');
    Route::put('/model/{id}','Main\ModelController@update')->name('model.update');
    Route::get('/model/create','Main\ModelController@create')->name('model.create');
    Route::post('/model/store','Main\ModelController@store')->name('model.store');
    
    //types Resource
    Route::get('/body_type','Main\BodyTypeController@index')->name('body_type.index');
    Route::get('/body_type/{id}/edit','Main\BodyTypeController@edit')->name('body_type.edit');
    Route::get('/body_type/{id}/show','Main\BodyTypeController@edit')->name('body_type.show');
    Route::put('/body_type/{id}','Main\BodyTypeController@update')->name('body_type.update');
    Route::get('/body_type/create','Main\BodyTypeController@create')->name('body_type.create');
    Route::post('/body_type/store','Main\BodyTypeController@store')->name('body_type.store');
    
    //driving_wheel Resource
    Route::get('/driving_wheel','Main\DrivingWheelController@index')->name('driving_wheel.index');
    Route::get('/driving_wheel/{id}/edit','Main\DrivingWheelController@edit')->name('driving_wheel.edit');
    Route::get('/driving_wheel/{id}/show','Main\DrivingWheelController@edit')->name('driving_wheel.show');
    Route::put('/driving_wheel/{id}','Main\DrivingWheelController@update')->name('driving_wheel.update');
    Route::get('/driving_wheel/create','Main\DrivingWheelController@create')->name('driving_wheel.create');
    Route::post('/driving_wheel/store','Main\DrivingWheelController@store')->name('driving_wheel.store');

    //driving_wheel Resource
    Route::get('/transmission','Main\TransmissionController@index')->name('transmission.index');
    Route::get('/transmission/{id}/edit','Main\TransmissionController@edit')->name('transmission.edit');
    Route::get('/transmission/{id}/show','Main\TransmissionController@edit')->name('transmission.show');
    Route::put('/transmission/{id}','Main\TransmissionController@update')->name('transmission.update');
    Route::get('/transmission/create','Main\TransmissionController@create')->name('transmission.create');
    Route::post('/transmission/store','Main\TransmissionController@store')->name('transmission.store');

    //fuel Resource
    Route::get('/fuel','Main\FuelController@index')->name('fuel.index');
    Route::get('/fuel/{id}/edit','Main\FuelController@edit')->name('fuel.edit');
    Route::get('/fuel/{id}/show','Main\FuelController@edit')->name('fuel.show');
    Route::put('/fuel/{id}','Main\FuelController@update')->name('fuel.update');
    Route::get('/fuel/create','Main\FuelController@create')->name('fuel.create');
    Route::post('/fuel/store','Main\FuelController@store')->name('fuel.store');

    //color Resource
    Route::get('/color','Main\ColorController@index')->name('color.index');
    Route::get('/color/{id}/edit','Main\ColorController@edit')->name('color.edit');
    Route::get('/color/{id}/show','Main\ColorController@edit')->name('color.show');
    Route::put('/color/{id}','Main\ColorController@update')->name('color.update');
    Route::get('/color/create','Main\ColorController@create')->name('color.create');
    Route::post('/color/store','Main\ColorController@store')->name('color.store');

    ///Roles
    Route::get('/roles_settings', 'Roles\RolesController@display_roles')->name('roles_settings');
    Route::get('/populate_roles', 'Roles\RolesController@populate_roles')->name('populate_roles');
    Route::post('/change_roles', 'Roles\RolesController@change_roles')->name('change_roles');
});

View::composer(["*"], function($view){
    $roles = UserRoleModel::roles();
    ////Notifications
    $months = array(
                    1 => "January",
                    2 => "February",
                    3 => "March",
                    4 => "April",
                    5 => "May",
                    6 => "June",
                    7 => "July",
                    8 => "August",
                    9 => "September",
                    10 => "October",
                    11 => "November",
                    12 => "December"
                );

    $months_short = array(
                    1 => "Jan",
                    2 => "Feb",
                    3 => "Mar",
                    4 => "Apr",
                    5 => "May",
                    6 => "Jun",
                    7 => "Jul",
                    8 => "Aug",
                    9 => "Sep",
                    10 => "Oct",
                    11 => "Nov",
                    12 => "Dec"
                );         

    $call_model_sms = function($header,$body,$type){
        ?>
            <script type="text/javascript">
                $(document).ready(function(){
                    call_model("<?=$header;?>", "<?=$body;?>", "<?=$type;?>");

                    function call_model(title, body, type){
                        $("#errorModelButton").click();
                        $("#largeModalLabel").html(title);
                        $("#body_sms").html(body);
                        $("#body_sms").addClass('alert alert-'+type);
                    }
                });
            </script>
        <?php
    };

    $name = Route::currentRouteName();
    $validation = false;
    if(array_key_exists($name,$roles)){
        if(!$roles[$name] == 1){
            $validation = true;
        }
    }else{
        $validation = true;
    }
    if($name == "home"){
        $validation = false;
        $name = "dashboard";
    }
    $view->with([
                'view_months' => $months, 
                'view_months_short' => $months_short, 
                'call_model_sms' => $call_model_sms,
                'navigation' => $roles, 
                'authorization' => $validation, 
                'page_name' => $name, 
                'date_viewer' => function($date){
                                    $date = date_create($date);
                                    return date_format($date ,'d/m/Y');
                                },
                'date_picker' => function($date){
                                    $date = date_create($date);
                                    return date_format($date ,'Y-m-d');
                                },
                'roles_button' => function($key) use($roles){
                            if(array_key_exists($key,$roles)){
                                if($roles[$key] == 1){
                                    return true;
                                }else{
                                    return false;
                                }
                            }else{
                                return false;
                            }
                        },
                'replace' => function($field,$name = '_id'){
                                return str_replace($name,'',$field);
                             },
                'contain' => function ($field,$name="_id"){
                                return strpos($field,$name);
                             },
                'contain_desc' => function($field){
                                    return strpos(strtoupper($field),strtoupper('descriptioin')) || strpos(strtoupper($field),strtoupper('description'));
                                },
                ]);
});
