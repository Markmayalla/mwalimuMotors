<?php

namespace App\models\Main;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    //
    protected $table = "cars";
    protected $fillable = [
        'brand_id','model_id','body_type_id','price',
        'millage','driving_wheel_id','engine_size','color_id',
        'transmission_id','registration_year_date',
        'manufacture_year_date','fuel_id','seat_no','door'
    ];

    public function brands(){
        return $this->belongsTo(BrandModel::class,'brand_id','id');
    }

    public function pictures(){
        return $this->hasMany(CarPictureModel::class,'car_id','id');
    }

    public function models(){
        return $this->belongsTo(ModelModel::class,'model_id','id');
    }

    public function body_types(){
        return $this->belongsTo(BodyTypeModel::class,'body_type_id','id');
    }

    public function colors(){
        return $this->belongsTo(ColorModel::class,'color_id','id');
    }

    public function driving_wheels(){
        return $this->belongsTo(DrivingWheelModel::class,'driving_wheel_id','id');
    }

    public function transmissions(){
        return $this->belongsTo(TransmissionModel::class,'transmission_id','id');
    }

    public function fuels(){
        return $this->belongsTo(BodyTypeModel::class,'fuel_id','id');
    }

    public function Att()
    {
        return $this->fillable;
    }
}
