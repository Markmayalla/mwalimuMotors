<?php

namespace App\Http\Controllers\Roles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Roles\UserRoleModel;

class RolesController extends Controller
{
    //
    public function display_roles(){
        return view('settings.roles.index');
    }

    public function populate_roles(){
        $data['modelRoles'] = UserRoleModel::user_per_role();
        return view('settings.roles.roles',$data);
    }

    public function change_roles(Request $request){
        $rid = $request->rid;
        $break_down_rid = explode('-',$rid);
        $role = $break_down_rid[1];
        $function_name = $break_down_rid[0];
        $status = $request->status;

        if(UserRoleModel::where('rid','=',$rid)->count()){
            UserRoleModel::where('rid','=',$rid)->update(['status' => $status]);
        }else{
            UserRoleModel::create(
                [
                    'rid' => $rid,
                    'role' => $role,
                    'function_name' => $function_name,
                    'status' => $status
                ]
            );
        }
    }
}
