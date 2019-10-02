<?php

namespace App\models\Main;

use Illuminate\Database\Eloquent\Model;

class FuelModel extends Model
{
    //
    protected $table = "fuels";
    protected $fillable = ['name'];

    public function cars(){
        return $this->hasMany(CarModel::class,'fuel_id','id');
    }

    public function Att()
    {
        return $this->fillable;
    }
}
