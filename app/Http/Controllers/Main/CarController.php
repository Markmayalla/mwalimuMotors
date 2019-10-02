<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiWebHelper;
use App\Http\Helpers\FileUploadHelper;
use App\Http\Helpers\SearchQuery;
use App\models\Main\BodyTypeModel;
use App\models\Main\BrandModel;
use App\models\Main\CarModel;
use App\models\Main\CarPictureModel;
use App\models\Main\ColorModel;
use App\models\Main\DrivingWheelModel;
use App\models\Main\FuelModel;
use App\models\Main\ModelModel;
use App\models\Main\TransmissionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cars = SearchQuery::filter(CarModel::orderBy('id','asc'),['title','description'],'like')->paginate(SearchQuery::per_page());
        return ApiWebHelper::response(compact('cars'),'car.index','cars');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['data']['brands'] = BrandModel::all();
        $data['data']['models'] = ModelModel::all();
        $data['data']['body_types'] = BodyTypeModel::all();
        $data['data']['driving_wheels'] = DrivingWheelModel::all();
        $data['data']['transmissions'] = TransmissionModel::all();
        $data['data']['fuels'] = FuelModel::all();
        $data['data']['colors'] = ColorModel::all();
        $model = new CarModel();
        $data['data']['fields'] = $model->att();
        return ApiWebHelper::response($data,'car.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[]);
        $cars = function() use ($request){
            return CarModel::create([
                'brand_id' => $request->brand,
                'model_id' => $request->model,
                'body_type_id' => $request->body_type,
                'price' => $request->price,
                'millage' => $request->millage,
                'color_id' => $request->color,
                'driving_wheel_id' => $request->driving_wheel,
                'engine_size' => $request->engine_size,
                'transmission_id' => $request->transmission,
                'registration_year_date' => $request->registration_year_date,
                'manufacture_year_date' => $request->manufacture_year_date,
                'fuel_id' => $request->fuel,
                'seat_no' => $request->seat_no,
                'door' => $request->door,
            ]);
        };
        $cars = $cars();
        if($cars->wasRecentlyCreated){
            $car_pictures = FileUploadHelper::upload_many($request->file('picture'),'car_pictures/'.$cars->id);
            $array = [];
            foreach($car_pictures as $pic){
                $array[] = new CarPictureModel([
                    'picture' => $pic,
                    'car_id' => $cars->id
                ]);
            }
            if(count($array)){
                $cars->pictures()->saveMany($array);
            }
        }
        return ApiWebHelper::response([compact('cars'),'Successfull!!'],['car.index','Created'],['','success'],true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $cars = [];
        if($id != null){
            $cars = CarModel::where('id',$id)->get();
        }
        return ApiWebHelper::response(compact('cars'),'car.show');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cars = CarModel::where('id',$id);
        if(!$cars->count()){
            return ApiWebHelper::response([[],'Not found ' . $id],['car.index','not found'],['','warning'],true);
        }
        $data['data']['car'] = $cars->get()[0];
        $data['data']['brands'] = BrandModel::all();
        $data['data']['models'] = ModelModel::all();
        $data['data']['body_types'] = BodyTypeModel::all();
        $data['data']['driving_wheels'] = DrivingWheelModel::all();
        $data['data']['transmissions'] = TransmissionModel::all();
        $data['data']['fuels'] = FuelModel::all();
        $data['data']['colors'] = ColorModel::all();
        $model = new CarModel();
        $data['data']['fields'] = $model->att();
        return ApiWebHelper::response($data,'car.edit');
    }

    public function picture($id){
        if(isset($_GET['action']) && isset($_GET['picture'])){
            if(!empty($_GET['action']) && !empty($_GET['picture'])){
                $action = $_GET['action'];
                $picture = $_GET['picture'];
                if($action == 'delete'){
                    CarPictureModel::where('id',$picture)->delete();
                }else{
                    CarPictureModel::where('id',$id)->update([$action.'_image' => $picture ]);   
                }
            }
        }
        $cars = [];
        if($id != null){
            $cars = CarModel::where('id',$id);
            if($cars->count()){
                $car = $cars->get()[0]; 
            }else{
                return ApiWebHelper::response([[],'Not found ' . $id],['car.index','not found'],['','warning'],true); 
            }
        }
        return ApiWebHelper::response(compact('car'),'car.picture');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[]);
        $cars = CarModel::where('id',$id);
        if(!$cars->count()){
            return ApiWebHelper::response([],'car.index');
        }
        if(isset($_GET['picture'])){
            $cars = function() use ($request,$id){
                $car_pictures = FileUploadHelper::upload_many($request->file('picture'),'car_pictures/'.$id);
                foreach($car_pictures as $pic){
                    CarPictureModel::create([
                        'picture' => $pic,
                        'car_id' => $id
                    ]);
                }
            };
        }else{
            $cars = function() use ($request,$cars){
                return $cars->update([
                    'brand_id' => $request->brand,
                    'model_id' => $request->model,
                    'body_type_id' => $request->body_type,
                    'price' => $request->price,
                    'millage' => $request->millage,
                    'color_id' => $request->color,
                    'driving_wheel_id' => $request->driving_wheel,
                    'engine_size' => $request->engine_size,
                    'transmission_id' => $request->transmission,
                    'registration_year_date' => $request->registration_year,
                    'manufucture_year_date' => $request->manufucture_year,
                    'fuel' => $request->fuel,
                    'seat_no' => $request->seat_no,
                    'door' => $request->door,
                ]);
            };
        }
        $cars = $cars();
        return ApiWebHelper::response([compact('cars'),'Successfull Updated!!'],['car.index','Updated Successfull'],['','success'],true);
    }

    public function block($id){
        $cars = [];
        if($id != null){
            $cars = function() use ($id){
                $p = CarModel::where('id',$id);
                if($p->count()){
                    $ps = $p->get()[0];
                    $s = $ps->status == 1 ? 0 : 1;
                    $p->update(['status' => $s]);
                }
            };
            $cars = $cars();
        }
        return ApiWebHelper::response([compact('cars'),'Successfull Updated!!'],['car.index','Updated Successfull'],['','success'],true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
