<?php

namespace App\Http\Controllers;
//use Maatwebsite\Excel\Concerns\FromCollection;
use App\CompanyDetails;
use App\Imports\QuestionsImport;
use App\Webinar;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;
use App\TQCategoryDetails;
use App\TQConceptDetails;
use App\TQ;
use Session;

class AddQuestionController extends Controller
{
    //

    public function index(){
        $categories = TQCategoryDetails::distinct()->get(['category']);
//        echo $categories;
        return view('admin/add_new_question')->with('categories', $categories);
    }


    public function getSubCategory($category_name){
        $sub_categories['data'] = TQCategoryDetails::fetchSubCategory($category_name);
        echo json_encode($sub_categories);
        exit;
    }

    public function getSubConcept($sub_category, $concept){
        $category_id = TQCategoryDetails::where('sub_category', $sub_category)->pluck('tq_category_details_id');
        $tq_category_id = 0;
        foreach ($category_id as $id){
            $tq_category_id  = $id;
        }

        $sub_concept['data'] = TQConceptDetails::fetchSubConcept($tq_category_id, $concept);
        echo json_encode($sub_concept);
        exit;
    }


    public function proceedForm(Request $request){
//        echo "hey";
//        echo $_POST['category'];
//        echo $_POST['sub_category'];
//        echo $_POST['concept'];
//        echo $_POST['sub_concept'];
//        echo $_POST['no_of_ques'];
//        echo $_POST['ques_file'];

        $category_details_id = TQCategoryDetails::where('category',$_POST['category'])->where('sub_category',$_POST['sub_category'])->pluck('tq_category_details_id');
//        echo $category_details_id;

        $tq_category_details_id = 0;
        foreach ($category_details_id as $value){
            $tq_category_details_id = $value;
        }

        $concept_details_id = TQConceptDetails::where('tq_category_details_id',$tq_category_details_id)->where('level',$_POST['concept'])->where('sub_concept',$_POST['sub_concept'])->pluck('tq_concept_details_id');
//        echo $category_details_id;

        $tq_concept_details_id = 0;
        foreach ($concept_details_id as $value){
            $tq_concept_details_id = $value;
        }


//        echo $tq_category_details_id;
//        echo $tq_concept_details_id;
        $_SESSION['$tq_category_details_id'] = $tq_category_details_id;
        $_SESSION['$tq_concept_details_id'] = $tq_concept_details_id;


            echo "file selected";
//            echo $_POST['ques_file'];
            //insert all details through excel file with concept id
            if($request->hasFile('ques_file')){
//                echo "here";
                $path = $request->file('ques_file')->getRealPath();
//                echo $path;
                $data = Excel::import(new QuestionsImport, \request()->file('ques_file'));
//                echo $data->count();
//                print_r($data);
                //
//                $arr = array();
//                if($data->count()){
//                    foreach ($data as $key => $value) {
//                        $arr[] = ['name' => $value->name, 'details' => $value->details];
//                    }
//                        echo "ss";
//                    print_r($arr);
//                    if(!empty($arr)){
////                        \DB::table('tq_test_questions')->insert($arr);
//                        dd('Insert Record successfully.');
//                    }
//                }
                //
//                https://www.itsolutionstuff.com/post/laravel-57-import-export-excel-to-database-exampleexample.html
//                https://docs.laravel-excel.com/3.1/imports/basics.html
                return $this->index();
            }
        else{
//            echo "no file";
            $ques_count_array = array();
            $ques_count = $_POST['no_of_ques'];
            $count = 0;
            while($ques_count!=0){
                $ques_count_array[$count] = 1;
                $count++;
                $ques_count--;
            }
            return view('admin/add_manual_question')->with('no_of_ques',$ques_count_array)->with('tq_category_details_id', $tq_category_details_id)->with('tq_concept_details_id',$tq_concept_details_id);
        }

    }

    public function saveManualForm(){
//        print_r($_POST['question_statement']);
//        print_r($_POST['option_1']);
//        print_r($_POST['option_2']);
//        print_r($_POST['option_3']);
//        print_r($_POST['option_4']);
//        print_r($_POST['correct_option']);
//        print_r($_POST['direct_answer']);

        $tq_category_details_id = $_POST['tq_category_details_id'];
        $tq_concept_details_id = $_POST['tq_concept_details_id'];

        $count = sizeof($_POST['correct_option']);
        for($i=0; $i<$count; $i++){
            if($_POST['option_1'][$i]!=null && $_POST['option_2'][$i]!=null && $_POST['option_3'][$i]!=null && $_POST['option_4'][$i]!=null){
                $data = array(
                    'tq_category_details_id'=>$tq_category_details_id,
                    'tq_concept_details_id'=>$tq_concept_details_id,
                    'is_options_available'=>1,
                    'question_statement'=>$_POST['question_statement'][$i],
                    'option_1'=>$_POST['option_1'][$i],
                    'option_2'=>$_POST['option_2'][$i],
                    'option_3'=>$_POST['option_3'][$i],
                    'option_4'=>$_POST['option_4'][$i],
                    'correct_opton'=>$_POST['correct_option'][$i],
                );
            }else if($_POST['option_1'][$i]==null && $_POST['option_2'][$i]==null && $_POST['option_3'][$i]==null && $_POST['option_4'][$i]==null){
                $data = array(
                    'tq_category_details_id'=>$tq_category_details_id,
                    'tq_concept_details_id'=>$tq_concept_details_id,
                    'is_options_available'=>0,
                    'question_statement'=>$_POST['question_statement'][$i],
                    'correct_opton'=>$_POST['direct_answer'][$i],
                );
            }else{
                return view('admin/add_new_question');
            }

//            print_r($data); //
            TQ::insert($data);

        }

        return $this->index();
    }




    public function addWebinar(){
        $company_details = CompanyDetails::all();

        return view('admin/add_webinar_form')->with('company_details', $company_details);
    }


    public function submitWebinar(){
        $webinar_details = new Webinar();
        $webinar_details->company_id = $_POST['company_id'];
        $webinar_details->speaker_name = $_POST['speaker_name'];
        $webinar_details->technology = $_POST['technology'];
        $webinar_details->time = $_POST['time'];

        $webinar_details->save();

        return $this->addWebinar();
    }



}
