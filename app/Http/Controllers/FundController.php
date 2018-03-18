<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fund;
use Illuminate\Support\Facades\Input;

class FundController extends Controller
{
    //
    public function view(){
        $funds = Fund::all();
        return $funds;
    }//

    public function new(){
        return view('fund.new');

    }

    public function store(){
        $fund = new Fund;
        $fund->name = Input::get('name');
        $fund->save();
        return "Done";
    }//


    public function update(){

    }//


    public function delete(){
        
    }//

}
