<?php

namespace App\models\Main;

use Illuminate\Database\Eloquent\Model;

class DrivingWheelModel extends Model
{
    //
    protected $table = "driving_wheels";
    protected $fillable = ['name'];

    public function cars(){
        return $this->hasMany(CarModel::class,'driving_wheel_id','id');
    }

    public function Att()
    {
        return $this->fillable;
    }
}
