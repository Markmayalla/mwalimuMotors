<?php

namespace App\models\Main;

use Illuminate\Database\Eloquent\Model;

class ModelModel extends Model
{
    //
    protected $table = "models";
    protected $fillable = ['name','brand_id'];

    public function cars(){
        return $this->hasMany(CarModel::class,'model_id','id');
    }

    public function brands(){
        return $this->belongsTo(BrandModel::class,'brand_id','id');
    }

    public function Att()
    {
        return $this->fillable;
    }
}
