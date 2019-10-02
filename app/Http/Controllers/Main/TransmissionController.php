<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiWebHelper;
use App\Http\Helpers\SearchQuery;
use App\models\Main\TransmissionModel;
use Illuminate\Http\Request;

class TransmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $transmissions = SearchQuery::filter(TransmissionModel::orderBy('id','asc'),['name'],'like')->paginate(SearchQuery::per_page());
        return ApiWebHelper::response(compact('transmissions'),'transmission.index','models');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $model = new TransmissionModel();
        $data['data']['fields'] = $model->att();
        return ApiWebHelper::response($data,'transmission.create');
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
        $transmissions = function() use ($request){
            return TransmissionModel::create([
                'name' => $request->name,
            ]);
        };
        $transmissions = $transmissions();
        return ApiWebHelper::response([compact('transmissions'),'Successfull!!'],['transmission.index','Created'],['','success'],true);
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
        $transmissions = [];
        if($id != null){
            $transmissions = TransmissionModel::where('id',$id)->get();
        }
        return ApiWebHelper::response(compact('transmissions'),'transmission.show');
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
        $transmissions = TransmissionModel::where('id',$id);
        if(!$transmissions->count()){
            return ApiWebHelper::response([[],'Not found ' . $id],['transmission.index','not found'],['','warning'],true);
        }
        $data['data']['transmission'] = $transmissions->get()[0];
        $model_data = new TransmissionModel();
        $data['data']['fields'] = $model_data->att();
        return ApiWebHelper::response($data,'transmission.edit');
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
        $transmissions = TransmissionModel::where('id',$id);
        if(!$transmissions->count()){
            return ApiWebHelper::response([],'transmission.index');
        }
        $transmissions = function() use ($request,$transmissions){
            return $transmissions->update([
                'name' => $request->name,
            ]);
        };
        $transmissions = $transmissions();
        return ApiWebHelper::response([compact('transmissions'),'Successfull Updated!!'],['transmission.index','Updated Successfull'],['','success'],true);
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
