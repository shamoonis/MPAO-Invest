<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Investment;
use App\Fund;
use App\Institution;
use App\Type;


use Illuminate\Support\Facades\Input;

class InvestmentController extends Controller
{
    //
    public function view(){
        $invest = Investment::all();
        return $invest;
    }//

    public function new(){

        $data['fund'] = Fund::all();
        $data['inst'] = Institution::all();
        $data['type'] = Type::all();

        return view('investments.new', $data);

    }

    public function store(){

        $invest = new Investment;

        $invest->date = date('Y/m/d');
        $invest->funds_id = Input::get('funds_id');
        $invest->institutions_id = Input::get('institutions_id');
        $invest->types_id = Input::get('types_id');
        $invest->reference = Input::get('reference');
        $invest->purchasePrice = Input::get('purchasePrice');
        $invest->rate = Input::get('rate');
        $invest->maturityDays = Input::get('maturityDays');
        //$invest->created_at = date('Y/m/d');
        //$invest->updated_at = date('Y/m/d');
        $invest->save();

        return "Done";
    }//


    public function update(){

    }//


    public function delete(){
        
    }//
}
