<?php

namespace App\Http\Controllers;

use App\TQ;
//use App\TQController;
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
        echo $skill;
        echo $id;
        $tech=TQ::where('question_id',$id)->where('tag',$skill)->get();
//        echo $tech;
//        exit;
        return view('/template/tq_test')->with("tech",$tech)->with("skill",$skill);
//        exit;
    }
}
