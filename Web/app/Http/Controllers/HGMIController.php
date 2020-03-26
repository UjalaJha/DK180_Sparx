<?php

namespace App\Http\Controllers;
use App\HGMI;
use Illuminate\Http\Request;
use App\UserHGMI;
use Session;

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

//        echo Session::get('user_id');
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
        return view('template/dashboard');

    }
}
