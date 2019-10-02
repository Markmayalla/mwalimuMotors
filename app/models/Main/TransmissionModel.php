<?php

namespace App\models\Main;

use Illuminate\Database\Eloquent\Model;

class TransmissionModel extends Model
{
    //
    protected $table = "transmissions";
    protected $fillable = ['name'];

    public function cars(){
        return $this->hasMany(CarModel::class,'transmission_id','id');
    }

    public function Att()
    {
        return $this->fillable;
    }
}
