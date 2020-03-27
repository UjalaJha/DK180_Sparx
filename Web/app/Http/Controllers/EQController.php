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
        $eq_score = new UserEQ();
        $eq_score->user_id = Session::get('user_id');
        $eq_score->eq_self_awareness = $_POST["self_awareness"];
        $eq_score->eq_self_control	 = $_POST["self_control"];
        $eq_score->eq_achievement_orientation = $_POST["achievement_orientation"];
        $eq_score->eq_positive_outlook = $_POST["positive_outlook"];
        $eq_score->eq_inspirational_leadership = $_POST["inspirational_leadership"];
        $eq_score->eq_social_awareness = $_POST["social_awareness"];
        $eq_score->save();

        $user_id = Session::get('user_id');
        $user_test = UserTests::where('user_id',$user_id)->update(['eq_given'=>1]);
        return app('App\Http\Controllers\UserController')->redirectDashboard();

//        return view('template/dashboard');
    }
}
