<?php

namespace App\Http\Controllers;
use App\TQCategoryDetails;
use App\TQConceptDetails;
//use App\UserAQ;
use Illuminate\Http\Request;
use Session;
//use App\UserTests;

class AddTestController extends Controller
{
    public function index()
    {
        
    }
//    public function indexapi()
//    {
//
//    }

    public function addNewTest(){
        echo "here";
        $test=new TQCategoryDetails;
//        $test->stream=$_POST['stream'];
//        echo $stream;
        $test->category =$_POST['category'];
        $test->sub_category=$_POST['sub_category'];
//        $first_name=$_POST['first_name'];
//        $lastname=$_POST['last_name'];
    
//        print_r($first_name);
//        print_r($lastname);
        echo $test->sub_category;
//        print_r($test);
        $test->save();
        $tq_category_details_id_var=$test->tq_category_details_id;
        
        $test_concept=new TQConceptDetails;
        
        
        $test_concept->tq_category_details_id=$tq_category_details_id_var;
        $test_concept->level=$_POST['level'];
        echo $test_concept->tq_category_details_id.$test_concept->level;
        
        
//        print_r($_POST['concept_name']);
//        print_r($_POST['concept_number']);
        
        $count=sizeof($_POST['concept_name']);
        echo "<br>";
        echo $count;
        
        for($i=0;$i<$count;$i++){
            echo "<br>";
//            echo "cpp";
            $test_concept->sub_concept=$_POST['concept_name'][$i];
            
            $test_concept->no_of_questions=$_POST['concept_number'][$i];
            echo $test_concept->sub_concept."".$test_concept->no_of_questions;
//            $test_concept->save();
            
            $data=array(
            'tq_category_details_id'=>$tq_category_details_id_var,
            'level'=>$_POST['level'],
            'sub_concept'=>$_POST['concept_name'][$i],
            'no_of_questions'=>$_POST['concept_number'][$i]
            );
            
            
            
            
            
            
            
            
//            $data->category_id=>$tq_category_details_id_var;
//            $data->level=$test_concept->level;
//                $data->=$test_concept->sub_concept;
//                $data->no_of_question=$test_concept->no_of_questions;
            print_r($data);
            TQConceptDetails::insert($data);
            

        }
        
        
            
        
        
//        echo "".$lastname."".$first_name;
        
        
        
    }
}
