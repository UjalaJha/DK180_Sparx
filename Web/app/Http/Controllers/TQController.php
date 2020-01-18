<?php

namespace App\Http\Controllers;

use App\TQ;
//use App\TQController;
use App\UserTechnical;
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
    
    public function skill_test($skill,$id){
//        echo $skill;
//        echo $id;
        $tech=TQ::where('question_id',$id)->where('tag',$skill)->get();
//        echo $tech;
//        echo $skill;
//        exit;
        return view('/template/tq_test')->with("tech",$tech)->with("skill",$skill);
//        exit;
    }
    
    
    public function save_score()
    {
        echo "here";
        echo $_GET['scores'];
//        exit;s
        $user_id=Session::get('user_id');
        $l=$_GET['language'];
        echo $l;
        $tech=UserTechnical::where('user_id',$user_id)->where('language',$l)->update(['language_score'=>$_GET['scores']+1,'test_given'=>1]);
        
//        exit;
        return app('App\Http\Controllers\UserController')->skills_view();
//        return view('/template/tq_instructions');
//        exit;
        
        
    }
}
