<?php

namespace App\models\Main;

use Illuminate\Database\Eloquent\Model;

class CarPictureModel extends Model
{
    //
    protected $table = "car_pictures";
    protected $fillable = ['car_id','picture'];

    public function cars(){
        return $this->belongsTo(CarModel::class,'car_id','id');
    }
    
    public function Att()
    {
        return $this->fillable;
    }
}
