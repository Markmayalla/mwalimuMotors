<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ApiWebHelper;
use App\Http\Helpers\SearchQuery;
use App\models\Main\BodyTypeModel;
use App\models\Main\BrandModel;
use App\models\Main\CarModel;
use App\models\Main\ColorModel;
use App\models\Main\DrivingWheelModel;
use App\models\Main\FuelModel;
use App\models\Main\ModelModel;
use App\models\Main\TransmissionModel;

class PageController extends Controller
{
    public function index()
    {
        $brands = BrandModel::all();
        $models = ModelModel::all();
        $body_types = BodyTypeModel::all();
        $driving_wheels = DrivingWheelModel::all();
        $transmissions = TransmissionModel::all();
        $fuels = FuelModel::all();
        $colors = ColorModel::all();
        $cars = SearchQuery::filter(CarModel::orderBy('id','asc'),['title','description'],'like')->paginate(SearchQuery::per_page());
        return ApiWebHelper::response(compact('cars','brands','models','body_types','driving_wheels','transmissions','fuels','colors'),'pages.home','cars');
    }
}
