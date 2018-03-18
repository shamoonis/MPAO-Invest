<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Institution;
use Illuminate\Support\Facades\Input;

class InstitutionController extends Controller
{
    //
    //
    public function view(){
        $institution = Institution::all();
        return $institution;
    }//

    public function new(){
        return view('institution.new');

    }

    public function store(){

        $institution = new Institution;
        $institution->name = Input::get('name');
        $institution->save();
        return "Done";
    }//


    public function update(){

    }//


    public function delete(){
        
    }//

}
