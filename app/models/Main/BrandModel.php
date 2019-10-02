<?php

namespace App\models\Main;

use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    //
    protected $table = "brands";
    protected $fillable = ['name'];

    public function cars(){
        return $this->hasMany(CarModel::class,'brand_id','id');
    }

    public function models(){
        return $this->hasMany(ModelModel::class,'brand_id','id');
    }

    public function Att()
    {
        return $this->fillable;
    }
}
