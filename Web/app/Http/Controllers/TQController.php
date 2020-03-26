<?php

namespace App\Http\Controllers;

use App\TQ;
//use App\TQController;
use App\UserTechnical;
use App\TQUserAttempt;
use function PHPSTORM_META\type;
use Session;
use Illuminate\Http\Request;

class TQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TQ  $TQ
     * @return \Illuminate\Http\Response
     */
    public function show(TQ $TQ)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TQ  $TQ
     * @return \Illuminate\Http\Response
     */
    public function edit(TQ $TQ)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TQ  $TQ
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TQ $TQ)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TQ  $TQ
     * @return \Illuminate\Http\Response
     */
    public function destroy(TQ $TQ)
    {
        //
    }


    public function start_test($skill_id){
//        echo $skill_id;
        $question_details = TQ::where('tq_category_details_id', $skill_id)->where('is_level_2',0)->get();

        $all_question_id = TQ::where('tq_category_details_id', $skill_id)->where('is_level_2',0)->pluck('question_id');

        $ques_array = json_decode(json_encode($all_question_id), true);
        $_SESSION["all_question_id"] = $ques_array;

//        echo ($question_details);
//        echo ($all_question_id);
        return view('/template/tq_test')->with("question_details", $question_details)->with("all_question_id", $all_question_id)->with('skill_id', $skill_id);

    }


    public function start_advance_test($skill_id){
//        echo $skill_id;
        $question_details = TQ::where('tq_category_details_id', $skill_id)->where('is_level_2',1)->get();

        $all_question_id = TQ::where('tq_category_details_id', $skill_id)->where('is_level_2',1)->pluck('question_id');

        $adv_ques_array = json_decode(json_encode($all_question_id), true);
        $_SESSION["all_advance_question_id"] = $adv_ques_array;
//        echo gettype($all_question_id);
//        echo gettype($adv_ques_array);
//        print_r($adv_ques_array);

        $question_details_in_array = json_decode(json_encode($question_details), true);

        $question_details_in_array_new = array();
        $count = 0;
        $size = count($question_details_in_array);
        while($size!=0) {
            $question_details_in_array_new[$count] = array();
            $question_details_in_array_new[$count][0] = 1;
            $question_details_in_array_new[$count][1] = $question_details_in_array[0];
//            echo $question_details_in_array_new[$count][0];
            $count++;
            $size--;

//            echo $count;
        }

//        print_r($question_details_in_array_new);
//        echo $question_details_in_array_new[0][0];

//         print_r($question_details_in_array);
//        echo ($all_question_id);
        return view('/template/advance_tq_test')->with("question_details_in_array_new", $question_details_in_array_new)->with("all_question_id", $all_question_id)->with('skill_id', $skill_id);

    }


    public function skill_test($skill_id,$ques_id){
//        echo $skill;
//        echo $id;
        $question_details=TQ::where('question_id',$ques_id)->get();
        $all_question_id = TQ::where('tq_category_details_id', $skill_id)->where('is_level_2',0)->pluck('question_id');
//        echo $tech;
//        echo $skill;

        return view('/template/tq_test')->with("question_details",$question_details)->with("skill_id",$skill_id)->with("all_question_id", $all_question_id);
//        exit;
    }


    public function skill_advance_test($skill_id,$ques_id){
//        echo $skill;
//        echo $id;
        $question_details=TQ::where('question_id',$ques_id)->get();
        $all_question_id = TQ::where('tq_category_details_id', $skill_id)->where('is_level_2',1)->pluck('question_id');
//        echo $tech;
//        echo $skill;

        $adv_ques_array = json_decode(json_encode($all_question_id), true);
        $_SESSION["all_advance_question_id"] = $adv_ques_array;


        $question_details_in_array = json_decode(json_encode($question_details), true);

        $question_details_in_array_new = array();
//        $count = 0;
//        $size = count($question_details_in_array);
//        while($size!=0) {
            $question_details_in_array_new[0] = array();
            $question_details_in_array_new[0][0] = 0;
            $question_details_in_array_new[0][1] = $question_details_in_array[0];
//            $count++;
//            $size--;
//        }


        return view('/template/advance_tq_test')->with("question_details_in_array_new",$question_details_in_array_new)->with("skill_id",$skill_id)->with("all_question_id", $all_question_id);
//        exit;
    }




    public function save_score()
    {
        echo "here";
        echo $_GET['scores'];
//        exit;s
        $user_id=Session::get('user_id');
        $skill_category_id=$_GET['skill_category_id'];
//        echo $l;

        $attempt = TQUserAttempt::where('user_id', $user_id)->where('tq_category_details_id',$skill_category_id)->where('level_number',1)->get();
        $attempt = count($attempt);
        echo "attempt".$attempt;


        $max_score = TQUserAttempt::where('user_id', $user_id)->where('tq_category_details_id',$skill_category_id)->where('level_number',1)->max('score');
        echo "max score = ".$max_score;

        $final_score_to_store = 0;
        if($max_score!=null) {
            $final_score_to_store = $max_score;
            if ($_GET["scores"] > $max_score) {
                $final_score_to_store = $_GET["scores"];
            }
        }else{

            $final_score_to_store = $_GET["scores"];
        }

        $eligible = 0;
        if($final_score_to_store>3){
            $eligible = 1;
        }
        $tech = UserTechnical::where('user_id',$user_id)->where('tq_category_details_id',$skill_category_id)->update(['level_1_test_given'=>1,'level_1_score'=>$final_score_to_store,'level_2_eligible'=>$eligible,'attempt_number'=>($attempt+1)]);

        $user_attempt = new TQUserAttempt();
        $user_attempt->user_id = $user_id;
        $user_attempt->tq_category_details_id = $skill_category_id;
        $user_attempt->attempt_number = ($attempt+1);
        $user_attempt->score = $_GET['scores'];
        $user_attempt->level_number = 1;
        $user_attempt->save();

//        exit;
        return app('App\Http\Controllers\UserController')->skills_view();
//        return view('/template/tq_instructions');
//        exit;

    }



    public function save_advance_score()
    {
        echo "here";
        echo $_GET['scores'];
//        exit;s
        $user_id=Session::get('user_id');
        $skill_category_id=$_GET['skill_category_id'];
//        echo $l;

        $attempt = TQUserAttempt::where('user_id', $user_id)->where('tq_category_details_id',$skill_category_id)->where('level_number',2)->get();
        $attempt = count($attempt);
        echo "attempt".$attempt;


        $max_score = TQUserAttempt::where('user_id', $user_id)->where('tq_category_details_id',$skill_category_id)->where('level_number',2)->max('score');
        echo "max score = ".$max_score;

        $final_score_to_store = 0;
        if($max_score!=null) {
//            echo "hey";
            $final_score_to_store = $max_score;
            if ($_GET["scores"] > $max_score) {
                $final_score_to_store = $_GET["scores"];
            }
        }else{
//            echo "max null";
            $final_score_to_store = $_GET["scores"];
        }



//        $eligible = 0;
//        if($final_score_to_store>3){
//            $eligible = 1;
//        }
        $tech = UserTechnical::where('user_id',$user_id)->where('tq_category_details_id',$skill_category_id)->update(['level_2_test_given'=>1,'level_2_score'=>$final_score_to_store,'attempt_number'=>($attempt+1)]);

        $user_attempt = new TQUserAttempt();
        $user_attempt->user_id = $user_id;
        $user_attempt->tq_category_details_id = $skill_category_id;
        $user_attempt->attempt_number = ($attempt+1);
        $user_attempt->score = $_GET['scores'];
        $user_attempt->level_number = 2;
        $user_attempt->save();

//        exit;
        return app('App\Http\Controllers\UserController')->advance_skills_view();
//        return view('/template/tq_instructions');
//        exit;

    }


}
