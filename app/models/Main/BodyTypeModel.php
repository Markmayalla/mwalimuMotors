<?php

namespace App\models\Main;

use Illuminate\Database\Eloquent\Model;

class BodyTypeModel extends Model
{
    //
    protected $table = "body_types";
    protected $fillable = ['name'];

    public function cars(){
        return $this->hasMany(CarModel::class,'body_type_id','id');
    }

    public function Att()
    {
        return $this->fillable;
    }
}
