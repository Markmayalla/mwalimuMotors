<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiWebHelper;
use App\Http\Helpers\SearchQuery;
use App\models\Main\FuelModel;
use Illuminate\Http\Request;

class FuelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fuels = SearchQuery::filter(FuelModel::orderBy('id','asc'),['name'],'like')->paginate(SearchQuery::per_page());
        return ApiWebHelper::response(compact('fuels'),'fuel.index','fuels');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $model = new FuelModel();
        $data['data']['fields'] = $model->att();
        return ApiWebHelper::response($data,'fuel.create');
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
        $fuels = function() use ($request){
            return FuelModel::create([
                'name' => $request->name,
            ]);
        };
        $fuels = $fuels();
        return ApiWebHelper::response([compact('fuels'),'Successfull!!'],['fuel.index','Created'],['','success'],true);
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
        $fuels = [];
        if($id != null){
            $fuels = FuelModel::where('id',$id)->get();
        }
        return ApiWebHelper::response(compact('fuels'),'fuel.show');
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
        $fuels = FuelModel::where('id',$id);
        if(!$fuels->count()){
            return ApiWebHelper::response([[],'Not found ' . $id],['fuel.index','not found'],['','warning'],true);
        }
        $data['data']['fuel'] = $fuels->get()[0];
        $model_data = new FuelModel();
        $data['data']['fields'] = $model_data->att();
        return ApiWebHelper::response($data,'fuel.edit');
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
        $fuels = FuelModel::where('id',$id);
        if(!$fuels->count()){
            return ApiWebHelper::response([],'fuel.index');
        }
        $fuels = function() use ($request,$fuels){
            return $fuels->update([
                'name' => $request->name,
            ]);
        };
        $fuels = $fuels();
        return ApiWebHelper::response([compact('fuels'),'Successfull Updated!!'],['fuel.index','Updated Successfull'],['','success'],true);
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
