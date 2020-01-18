<?php

namespace App\Http\Controllers;
use App\AQ;
use Illuminate\Http\Request;

class AQController extends Controller
{
    public function index()
    {
        $aq=AQ::all();
        // echo "<pre>";
        // \Session:: set("iq_test_marks",0);
        return view('template/aq')->with('aq',$aq);
        // print_r($iq[0]->question_statement);
    }
    public function indexapi()
    {
        $aq=AQ::all()->toJson();
        return $aq;
    }
    public function show($id)
    {

        $aq=AQ::where('question_id',$id)->get();
        // echo "<pre>";
        return view('template/aq')->with('aq',$aq);
        // print_r($iq[0]->question_statement);
    }
}
