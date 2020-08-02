<?php

namespace App\Http\Controllers;
use App\AQ;
use App\UserAQ;
use App\UserRatings;
use Illuminate\Http\Request;
use Session;
use App\UserTests;

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

    public function storeAQ(){
        $aq_score = new UserAQ();
        $aq_score->user_id = Session::get('user_id');
//        echo $_POST['persistence'];
//        echo $_POST['boldness'];
//        echo $_POST['complexity'];
//        echo $_POST['abstraction'];
//        echo $_POST['curiosity'];

        $aq_score->aq_persistence = $_POST['persistence'];
        $aq_score->aq_boldness = $_POST['boldness'];
        $aq_score->aq_complexity = $_POST['complexity'];
        $aq_score->aq_abstraction = $_POST['abstraction'];
        $aq_score->aq_curiosity = $_POST['curiosity'];
        $aq_score->save();

        $user_id = Session::get('user_id');
        $user_test = UserTests::where('user_id',$user_id)->update(['aq_given'=>1]);


        $gettingAllStars = UserRatings::where('user_id', Session::get('user_id'))->get();
        foreach ($gettingAllStars as $eachLanguage){
            $lang = $eachLanguage['language'];
            $internship_star = $eachLanguage['internship_star'];
            $project_star = $eachLanguage['project_star'];
            $technical_star = $eachLanguage['technical_star'];
            $iq_star = $eachLanguage['iq_star'];
            $total_star = $internship_star + $project_star + $technical_star + $iq_star;

            UserRatings::where('user_id',$user_id)->where('language', $lang)->update(['total_star'=>$total_star]);

        }


        return app('App\Http\Controllers\AQController')->fetch_aq_score();
        // return app('App\Http\Controllers\UserController')->redirectDashboard();


//        return view('template/dashboard');

    }
    public function fetch_aq_score(){
        $user_id=Session::get('user_id');
        $aq=UserAQ::where('user_id',$user_id)->get();
        // echo "<pre>";
        // print_r($aq);
        // echo $eq[0]->eq_self_awareness;
        // exit();
        return view('template/aq_result')->with('aq',$aq);
    }

}
