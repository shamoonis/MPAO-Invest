<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;
use Illuminate\Support\Facades\Input;

class TypeController extends Controller
{
    //

    public function view(){
        
        $type = Type::all();
        return $type;
    }//

    public function new(){
        return view('type.new');

    }

    public function store(){

        $type = new Type;
        $type->name = Input::get('name');
        $type->save();
        return "Done";
    }//


    public function update(){

    }//


    public function delete(){
        
    }//

}
