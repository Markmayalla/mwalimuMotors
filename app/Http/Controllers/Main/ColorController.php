<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiWebHelper;
use App\Http\Helpers\SearchQuery;
use App\models\Main\ColorModel;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $colors = SearchQuery::filter(ColorModel::orderBy('id','asc'),['name'],'like')->paginate(SearchQuery::per_page());
        return ApiWebHelper::response(compact('colors'),'color.index','colors');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $model = new ColorModel();
        $data['data']['fields'] = $model->att();
        return ApiWebHelper::response($data,'color.create');
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
        $colors = function() use ($request){
            return ColorModel::create([
                'name' => $request->name,
            ]);
        };
        $colors = $colors();
        return ApiWebHelper::response([compact('colors'),'Successfull!!'],['color.index','Created'],['','success'],true);
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
        $colors = [];
        if($id != null){
            $colors = ColorModel::where('id',$id)->get();
        }
        return ApiWebHelper::response(compact('colors'),'color.show');
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
        $colors = ColorModel::where('id',$id);
        if(!$colors->count()){
            return ApiWebHelper::response([[],'Not found ' . $id],['color.index','not found'],['','warning'],true);
        }
        $data['data']['color'] = $colors->get()[0];
        $model_data = new ColorModel();
        $data['data']['fields'] = $model_data->att();
        return ApiWebHelper::response($data,'color.edit');
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
        $colors = ColorModel::where('id',$id);
        if(!$colors->count()){
            return ApiWebHelper::response([],'color.index');
        }
        $colors = function() use ($request,$colors){
            return $colors->update([
                'name' => $request->name,
            ]);
        };
        $colors = $colors();
        return ApiWebHelper::response([compact('colors'),'Successfull Updated!!'],['color.index','Updated Successfull'],['','success'],true);
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
