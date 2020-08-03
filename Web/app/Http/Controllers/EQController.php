<?php

namespace App\Http\Controllers;

use App\EQ;
use App\UserEQ;
use Illuminate\Http\Request;
use Session;
use App\UserTests;

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

    public function storeEQ(){
        // $eq_score = new UserEQ();
        // $eq_score->user_id = Session::get('user_id');
        // $eq_score->eq_self_awareness = $_POST["self_awareness"]? $_POST["self_awareness"] : NULL;
        // $eq_score->eq_self_control   = $_POST["self_control"]? $_POST["self_control"] : NULL;
        // $eq_score->eq_achievement_orientation = $_POST["achievement_orientation"]? $_POST["achievement_orientation"] : NULL;
        // $eq_score->eq_positive_outlook = $_POST["positive_outlook"]?$_POST["positive_outlook"] : NULL;
        // $eq_score->eq_inspirational_leadership = $_POST["inspirational_leadership"]?  $_POST["inspirational_leadership"] : NULL;
        // $eq_score->eq_social_awareness = $_POST["social_awareness"]? $_POST["social_awareness"] : NULL;
        // $eq_score->save();
        $eq_score = new UserEQ();
        $eq_score->user_id = Session::get('user_id');
        $eq_score->eq_self_awareness =1;
        $eq_score->eq_self_control   = 3;
        $eq_score->eq_achievement_orientation = 5;
        $eq_score->eq_positive_outlook = 2;
        $eq_score->eq_inspirational_leadership = 4;
        $eq_score->eq_social_awareness = 1;
        $eq_score->save();
        $user_id = Session::get('user_id');
        $user_test = UserTests::where('user_id',$user_id)->update(['eq_given'=>0]);

        // return view('template/eq_result')->with('eq_self_awareness',$eq_score->eq_self_awareness);
        return app('App\Http\Controllers\EQController')->fetch_eq_score();

//        return view('template/dashboard');
    }

    public function fetch_eq_score(){

        $user_id = Session::get('user_id');
        $eq=UserEQ::where('user_id',$user_id)->get();
        // echo "<pre>";
        // print_r($eq);
        // echo $eq[0]->eq_self_awareness;
        // exit();
        return view('template/eq_result')->with('eq',$eq);
    }
}
