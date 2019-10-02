<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ProjectModel extends Model
{
    //
    protected $table = 'projects';
    protected $fillable = [
                            'title', 'client_name', 'contrait_value',
                            'financia', 'consultant', 'project_from_date',
                            'project_to_date', 'description', 'big_description',
                            'project_image', 'slider_image', 'summary_image'
                        ];
    
    public function pictures() {
        return $this->hasMany(ProjectPictureModel::class, 'project_id', 'id');
    } 

    public function scopeById($query, $id) {
        return $query->where('id','=',$id);
    }

    public function Att()
    {
        return $this->fillable;
    }

    public function scopeActive($query){
        return $query->where('status','=',1);
    }
}
