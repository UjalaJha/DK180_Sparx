<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IQ;
use App\Jobs;
class TestControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iq=IQ::all();
        // echo "<pre>";
        // \Session:: set("iq_test_marks",0);
        return view('template/iq')->with('iq',$iq);
        // print_r($iq[0]->question_statement);
    }
    public function show($id)
    {

        $iq=IQ::where('question_id',$id)->get();
        // echo "<pre>";
        return view('template/iq')->with('iq',$iq);
        // print_r($iq[0]->question_statement);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function companysubmit(){
//        echo "<pre>";
//        print_r($_POST);
//        exit;
        $jobs = new Jobs;
        $jobs->company_id=1;
        $jobs->job_role=$_POST['job_role'];
        $jobs->job_description=$_POST['job_description'];
        $jobs->salary=$_POST['salary'];

        $jobs->location=$_POST['location'];

        $jobs->experience=$_POST['experience'];

        $jobs->skills_recquired=$_POST['skills'];

        $jobs->empolyment_type=$_POST['empolyment_type'];

        $string='';
        foreach ($jobs->skills_recquired as $value){
            $string .=  $value.',';
        }
        $jobs->skills_recquired=$string;

        $jobs->save();
        return view('company/suggested_students');
    }

    public function show_jobs()
    {

        $jobs=Jobs::where('company_id',1)->get();
//         echo "<pre>";
//        print_r($jobs[0]->job_role);
        return view('company/view_jobs')->with('jobs',$jobs);
//        return view('template/iq')->with('iq',$iq);

    }


}
