<?php

namespace App\models\Main;

use Illuminate\Database\Eloquent\Model;

class ColorModel extends Model
{
    //
    protected $table = "colors";
    protected $fillable = ['name'];

    public function cars(){
        return $this->hasMany(CarModel::class,'color_id','id');
    }

    public function Att()
    {
        return $this->fillable;
    }
}
