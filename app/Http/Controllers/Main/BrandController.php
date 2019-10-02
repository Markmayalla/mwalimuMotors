<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiWebHelper;
use App\Http\Helpers\SearchQuery;
use App\models\Main\BrandModel;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brands = SearchQuery::filter(BrandModel::orderBy('id','asc'),['name'],'like')->paginate(SearchQuery::per_page());
        return ApiWebHelper::response(compact('brands'),'brand.index','brands');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $model = new BrandModel();
        $data['data']['fields'] = $model->att();
        return ApiWebHelper::response($data,'brand.create');
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
        $brands = function() use ($request){
            return BrandModel::create([
                'name' => $request->name,
            ]);
        };
        $brands = $brands();
        return ApiWebHelper::response([compact('brands'),'Successfull!!'],['brand.index','Created'],['','success'],true);
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
        $brands = [];
        if($id != null){
            $brands = BrandModel::where('id',$id)->get();
        }
        return ApiWebHelper::response(compact('brands'),'brand.show');
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
        $brands = BrandModel::where('id',$id);
        if(!$brands->count()){
            return ApiWebHelper::response([[],'Not found ' . $id],['brand.index','not found'],['','warning'],true);
        }
        $data['data']['brand'] = $brands->get()[0];
        $model = new BrandModel();
        $data['data']['fields'] = $model->att();
        return ApiWebHelper::response($data,'brand.edit');
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
        $brands = BrandModel::where('id',$id);
        if(!$brands->count()){
            return ApiWebHelper::response([],'brand.index');
        }
        $brands = function() use ($request,$brands){
            return $brands->update([
                'name' => $request->name,
            ]);
        };
        $brands = $brands();
        return ApiWebHelper::response([compact('brands'),'Successfull Updated!!'],['brand.index','Updated Successfull'],['','success'],true);
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
