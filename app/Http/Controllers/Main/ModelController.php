<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiWebHelper;
use App\Http\Helpers\SearchQuery;
use App\models\Main\BrandModel;
use App\models\Main\ModelModel;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $models = SearchQuery::filter(ModelModel::orderBy('id','asc'),['name'],'like')->paginate(SearchQuery::per_page());
        return ApiWebHelper::response(compact('models'),'model.index','models');
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
        $model = new ModelModel();
        $data['data']['fields'] = $model->att();
        return ApiWebHelper::response($data,'model.create');
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
        $models = function() use ($request){
            return ModelModel::create([
                'name' => $request->name,
                'brand_id' => $request->brand,
            ]);
        };
        $models = $models();
        return ApiWebHelper::response([compact('models'),'Successfull!!'],['model.index','Created'],['','success'],true);
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
        $models = [];
        if($id != null){
            $models = ModelModel::where('id',$id)->get();
        }
        return ApiWebHelper::response(compact('models'),'model.show');
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
        $models = ModelModel::where('id',$id);
        if(!$models->count()){
            return ApiWebHelper::response([[],'Not found ' . $id],['model.index','not found'],['','warning'],true);
        }

        $data['data']['model'] = $models->get()[0];
        $data['data']['brands'] = BrandModel::all();
        $model_data = new ModelModel();
        $data['data']['fields'] = $model_data->att();
        return ApiWebHelper::response($data,'model.edit');
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
        $models = ModelModel::where('id',$id);
        if(!$models->count()){
            return ApiWebHelper::response([],'model.index');
        }
        $models = function() use ($request,$models){
            return $models->update([
                'name' => $request->name,
                'brand_id' => $request->brand,
            ]);
        };
        $models = $models();
        return ApiWebHelper::response([compact('models'),'Successfull Updated!!'],['model.index','Updated Successfull'],['','success'],true);
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
