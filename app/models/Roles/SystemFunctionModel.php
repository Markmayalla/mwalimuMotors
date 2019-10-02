<?php

namespace App\models\Roles;

use Illuminate\Database\Eloquent\Model;

class SystemFunctionModel extends Model
{
    //
    //
    protected $table = 'system_function';

    protected $fillable = [
        'function_name'
    ];
}
