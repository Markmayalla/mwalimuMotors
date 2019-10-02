<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ProjectPictureModel extends Model
{
    //
    protected $table = "project_pictures";
    protected $fillable = ['project_id','picture'];

    public function projects(){
        return $this->belongsTo(ProjectModel::class,'project_id','id');
    }
}
