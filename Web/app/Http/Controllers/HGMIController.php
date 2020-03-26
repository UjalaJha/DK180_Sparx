<?php

namespace App\Http\Controllers;
use App\HGMI;
use Illuminate\Http\Request;
use App\UserHGMI;
use Session;
use App\UserTests;

class HGMIController extends Controller
{
    public function index()
    {
        $hgmi=HGMI::simplePaginate(10);
//        echo $hgmi;
        return view('template/hgmi', ['hgmi'=>$hgmi]);
        // print_r($iq[0]->question_statement);
    }
    public function indexapi()
    {
        $hgmi=HGMI::all()->toJson();
        return $hgmi;
    }

    public function storeScore(){

        $user_id = Session::get('user_id');
        $hgmi_score = new UserHGMI();
        $hgmi_score->user_id = Session::get('user_id');
        $hgmi_score->Verbal = $_POST['Verbal'];
        $hgmi_score->Logical = $_POST['Logical'];
        $hgmi_score->Musical = $_POST['Musical'];
        $hgmi_score->Visual = $_POST['Visual'];
        $hgmi_score->Kinesthetic = $_POST['Kinesthetic'];
        $hgmi_score->Intrapersonal = $_POST['Intrapersonal'];
        $hgmi_score->Interpersonal = $_POST['Interpersonal'];
        $hgmi_score->Naturalist = $_POST['Naturalist'];
        $hgmi_score->Existential = $_POST['Existential'];
        $hgmi_score->save();

        $user_test = UserTests::where('user_id',$user_id)->update(['hgmi_given'=>1]);
        return app('App\Http\Controllers\UserController')->redirectDashboard();


//        return view('template/dashboard');

    }
}
