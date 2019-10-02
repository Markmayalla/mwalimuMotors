<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiWebHelper;
use App\Http\Helpers\SearchQuery;
use App\models\Main\BodyTypeModel;
use Illuminate\Http\Request;

class BodyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $body_types = SearchQuery::filter(BodyTypeModel::orderBy('id','asc'),['name'],'like')->paginate(SearchQuery::per_page());
        return ApiWebHelper::response(compact('body_types'),'body_type.index','body_types');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $model = new BodyTypeModel();
        $data['data']['fields'] = $model->att();
        return ApiWebHelper::response($data,'body_type.create');
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
        $body_types = function() use ($request){
            return BodyTypeModel::create([
                'name' => $request->name,
            ]);
        };
        $body_types = $body_types();
        return ApiWebHelper::response([compact('body_types'),'Successfull!!'],['body_type.index','Created'],['','success'],true);
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
        $body_types = [];
        if($id != null){
            $body_types = BodyTypeModel::where('id',$id)->get();
        }
        return ApiWebHelper::response(compact('body_types'),'body_type.show');
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
        $body_types = BodyTypeModel::where('id',$id);
        if(!$body_types->count()){
            return ApiWebHelper::response([[],'Not found ' . $id],['body_type.index','not found'],['','warning'],true);
        }
        $data['data']['body_type'] = $body_types->get()[0];
        $model_data = new BodyTypeModel();
        $data['data']['fields'] = $model_data->att();
        return ApiWebHelper::response($data,'body_type.edit');
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
        $body_types = BodyTypeModel::where('id',$id);
        if(!$body_types->count()){
            return ApiWebHelper::response([],'body_type.index');
        }
        $body_types = function() use ($request,$body_types){
            return $body_types->update([
                'name' => $request->name,
            ]);
        };
        $body_types = $body_types();
        return ApiWebHelper::response([compact('body_types'),'Successfull Updated!!'],['body_type.index','Updated Successfull'],['','success'],true);
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
