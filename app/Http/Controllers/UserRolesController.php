<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User_Role;

class UserRolesController extends Controller
{
    //
    public function getUserRoles(){

        $role = User_Role::all();
        return $role;
    }

    public function getUserByRole($user){

        $role = User_Role::where('users_id',$user)->pluck('users_id');
        return $role;
    }

    //
    public function view(){

        
    }//

    public function store(){

    }//


    public function update(){

    }//

    public function delete(){

    }//

}
