<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiWebHelper;
use App\Http\Helpers\SearchQuery;
use App\models\Main\DrivingWheelModel;
use Illuminate\Http\Request;

class DrivingWheelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $driving_wheels = SearchQuery::filter(DrivingWheelModel::orderBy('id','asc'),['name'],'like')->paginate(SearchQuery::per_page());
        return ApiWebHelper::response(compact('driving_wheels'),'driving_wheel.index','driving_wheels');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $model = new DrivingWheelModel();
        $data['data']['fields'] = $model->att();
        return ApiWebHelper::response($data,'driving_wheel.create');
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
        $driving_wheels = function() use ($request){
            return DrivingWheelModel::create([
                'name' => $request->name,
            ]);
        };
        $driving_wheels = $driving_wheels();
        return ApiWebHelper::response([compact('driving_wheels'),'Successfull!!'],['driving_wheel.index','Created'],['','success'],true);
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
        $driving_wheels = [];
        if($id != null){
            $driving_wheels = DrivingWheelModel::where('id',$id)->get();
        }
        return ApiWebHelper::response(compact('driving_wheels'),'driving_wheel.show');
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
        $driving_wheels = DrivingWheelModel::where('id',$id);
        if(!$driving_wheels->count()){
            return ApiWebHelper::response([[],'Not found ' . $id],['driving_wheel.index','not found'],['','warning'],true);
        }
        $data['data']['driving_wheel'] = $driving_wheels->get()[0];
        $model_data = new DrivingWheelModel();
        $data['data']['fields'] = $model_data->att();
        return ApiWebHelper::response($data,'driving_wheel.edit');
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
        $driving_wheels = DrivingWheelModel::where('id',$id);
        if(!$driving_wheels->count()){
            return ApiWebHelper::response([],'driving_wheel.index');
        }
        $driving_wheels = function() use ($request,$driving_wheels){
            return $driving_wheels->update([
                'name' => $request->name,
            ]);
        };
        $driving_wheels = $driving_wheels();
        return ApiWebHelper::response([compact('driving_wheels'),'Successfull Updated!!'],['driving_wheel.index','Updated Successfull'],['','success'],true);
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
