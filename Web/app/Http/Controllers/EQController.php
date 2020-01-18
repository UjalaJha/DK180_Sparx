<?php

namespace App\Http\Controllers;

use App\EQ;
use Illuminate\Http\Request;

class EQController extends Controller
{
    public function index()
    {
        $eq=EQ::all();
        // echo "<pre>";
        // \Session:: set("iq_test_marks",0);
        return view('template/eq')->with('eq',$eq);
        // print_r($iq[0]->question_statement);
    }
     public function indexapi()
    {
        $eq=EQ::all()->toJson();
        return $eq;
       
    }


    public function show($id)
    {

        $eq=EQ::where('question_id',$id)->get();
        // echo "<pre>";
        return view('template/eq')->with('eq',$eq);
        // print_r($iq[0]->question_statement);
    }
}
