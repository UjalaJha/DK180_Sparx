<?php

namespace App\Http\Controllers;
use App\HGMI;
use Illuminate\Http\Request;

class HGMIController extends Controller
{
    public function index()
    {
        $hgmi=HGMI::all();
        
        // print_r($iq[0]->question_statement);
    }
    public function indexapi()
    {
        $hgmi=HGMI::all()->toJson();
        return $hgmi;
    }
    public function show($id)
    {

//        $aq=AQ::where('question_id',$id)->get();
        // echo "<pre>";
//        return view('template/aq')->with('aq',$aq);
        // print_r($iq[0]->question_statement);
    }
}
