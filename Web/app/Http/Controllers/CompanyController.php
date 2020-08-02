<?php

namespace App\Http\Controllers;

use App\Imports\QuestionsImport;
use App\Imports\CompanyQuestionsImport;
use App\TQ;
use App\CompanyCustomTQ;
use App\TQCategoryDetails;
use App\TQConceptDetails;
use App\UserAcademics;
use App\UserExperiences;
use App\UserPersonalDetails;
use App\UserTechnical;
use App\Webinar;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use Session;
use App\Jobs;
use App\CompanyDetails;

class CompanyController extends Controller
{


    public function index(){
        $categories = TQCategoryDetails::distinct()->get(['category']);
//        echo $categories;
        return view('company/add_new_question_company')->with('categories', $categories);
    }




    public function candidaterecommendation(){

        $cid = Session::get('company_id');

        $job_role = $_POST['job_role'];
        $salary = $_POST['salary'];
        $job_description = $_POST['job_description'];
        $empolyment_type = $_POST['empolyment_type'];
        $experience = $_POST['experience'];
        $location = $_POST['location'];
        $skills_required = '';
        foreach ($_POST['skills'] as $value){
            $skills_required .=  $value.',';
        }

        $new_job = new Jobs;
        $new_job->company_id = $cid;
        $new_job->job_role = $job_role;
        $new_job->job_description = $job_description;
        $new_job->salary = $salary;
        $new_job->location = $location;
        $new_job->empolyment_type = $empolyment_type;
        $new_job->experience = $experience;
        $new_job->skills_recquired = $skills_required;

        $company_name = CompanyDetails::where('company_id', $cid)->pluck('company_name');
        // echo $company_name[0];
        // exit;
        $new_job->company_name=$company_name[0];
        $new_job->save();

        
//        echo $company_name[0];

        // give this json
        // {
        //     "role_title": "database",
        //     "company_name": "RS Solutions",
        //     "description" : "Urgent need of DB designer. Can work from home too.",
        //     "exp":3,
        //     "loc":"Delhi",
        //     "salary":550000,
        //     "skills" : "NET Framework, ASP, Software Development, software engineer"
        // }

        $data['role_title']=$job_role;
        $data['company_name']=$company_name[0];  //coming from database
        $data['description']=$job_description;
        $data['exp']=$experience;
        $data['loc']=$location;
        $data['salary']=$salary;
        $data['skills']=$skills_required;
        $json=json_encode($data);
        $curl = curl_init();
        // print_r($json);
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://localhost:5006/candidate_api",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS =>$json,
          CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json"
          ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        // // $jsonDecode = json_decode(trim($jsonData), TRUE);
        // echo $response;
       // echo "<pre>";
        // print_r(json_decode($response, TRUE));
        // exit();
        $temp_response=json_decode($response, TRUE);
        if(empty($temp_response)){
          $temp_response = json_decode('{
          "recommended_candidates": [
            {
              "Education": "",
              "Email": "sagar.saxena.min17@itbhu.ac.in",
              "Experience": "",
              "LinkedIn": "",
              "Name": "sagar saxena",
              "Phone No": "7237971138",
              "Skillset": "Net,Data analytics,It,Analytics,C/c++,Data,Engineering,Python,Technology,R,C,Digital,Development,Operations,System,C++,Software,Software development",
              "Tags": "It,Music"
            },
            {
              "Education": "BTech",
              "Email": "17uec069@lnmiit.ac.in",
              "Experience": "",
              "LinkedIn": "",
              "Name": "mansi mittal",
              "Phone No": "918559924980",
              "Skillset": "Development,Research,Implement,Business,C++,Php,Optimization,Matlab,Technology,Mysql,Develop,Database,Software,Build,It,Seo,Marketing,C,Media,Management,Project,Digital,Software development",
              "Tags": "It,Marketing"
            },
            {
              "Education": "BTech",
              "Email": "17uec069@lnmiit.ac.in",
              "Experience": "",
              "LinkedIn": "",
              "Name": "mansi mittal",
              "Phone No": "918559924980",
              "Skillset": "Development,Research,Implement,Business,C++,Php,Optimization,Matlab,Technology,Mysql,Develop,Database,Software,Build,It,Seo,Marketing,C,Media,Management,Project,Digital,Software development",
              "Tags": "It,Marketing"
            },
            {
              "Education": "MBA,BCA",
              "Email": "kasturisen4998@gmail.com",
              "Experience": "",
              "LinkedIn": "https://www.linkedin.com/in/",
              "Name": "kasturi sen",
              "Phone No": "918460620601",
              "Skillset": "Design,Requirements,Asp.net,Web,Application,Development,Training,Java,Service,Php,Computer,Technology,Mysql,It,Leadership,C,Management,Software,Etc",
              "Tags": "Communications,It"
            },
            {
              "Education": "Btech,BTech",
              "Email": "pendliy.reddy.min17@itbhu.ac.in",
              "Experience": " PROJECTS Summer Industrial",
              "LinkedIn": "",
              "Name": "pendli yashwanth",
              "Phone No": "916392059890",
              "Skillset": "Programming,Engineering,Data structures,Systems,Development,Training,Adobe,Coding,Algorithms,Intern,Data,Microsoft,Photoshop,Word,Support,Powerpoint,Technical,Management,Project,Software,Software development",
              "Tags": ""
            },
            {
              "Education": "BE,HSC,SSC",
              "Email": "shindetejas1508@gmail.com",
              "Experience": " VESIT ",
              "LinkedIn": "https://www.linkedin.com/in/tejas-shinde-7ab02b189 github:  https:/",
              "Name": "tejas shinde",
              "Phone No": "918149636148",
              "Skillset": "Design,Web,Python,Inventory,Css,Hadoop,Database design,Application,Development,Spark,Algorithm,Github,Intern,Html,Developer,Java,Django,Switching,Php,Automated,Technology,Mysql,Iot,Oracle,Database,Information technology,Cloudera,Sql,Ups,It,Android,Javascript,Admin,C,Performance,Technical,Verification,System,Management,Project",
              "Tags": "Information technology,Mathematics"
            },
            {
              "Education": "HSC",
              "Email": "shrynitshangloo18@gmail.com",
              "Experience": " S S",
              "LinkedIn": "",
              "Name": "shrynit shangloo",
              "Phone No": "9867693914",
              "Skillset": "Inventory,Sales,Development,Research,Intern,Financial,Business,Data,Excel,Reports,Trading,Protocols,Database,Business development,Presentations,Marketing,Media,Pricing,Operations,Management,Benefits",
              "Tags": "Economics,Marketing"
            },
            {
              "Education": "BSc",
              "Email": "",
              "Experience": "",
              "LinkedIn": "",
              "Name": "curriculum vitae",
              "Phone No": "919973160020",
              "Skillset": "Programming,Development,Research,Data,Html,R,Statistics,Java,Applications,C++,Mysql,Analysis,Database,Scripting,Marketing,Technical,Media,Project,Software",
              "Tags": "Marketing"
            },
            {
              "Education": "MBA,BSc",
              "Email": "pgp10snehab@iimrohtak.ac.in",
              "Experience": "",
              "LinkedIn": "",
              "Name": "bharti mba|",
              "Phone No": "9873574993",
              "Skillset": "Requirements,Android,Excel,Finance,Microsoft,Budgeting,Technical,Writer,Development,Training,Database,Management,Software,Coding",
              "Tags": "Cs,Finance"
            },
            {
              "Education": "HSC,SSC,BE,Ms,ME",
              "Email": "â€‹karthikkeswani1234@gmail.com",
              "Experience": "",
              "LinkedIn": "",
              "Name": "mahesh keswani",
              "Phone No": "9699336323",
              "Skillset": "Design,Programming,Google analytics,Git,Web,Python,Css,Azure,Flash,Database design,Application,Development,Voice,Research,Analytics,Data,Html,Microsoft,Developer,Java,Ui,Django,Bootstrap,Library,Php,Technology,Analysis,Database,Oracle,Cloudera,Sql,It,Debugging,Javascript,Mobile,Technical,Network,Big data,System,Management,Project,Cloud",
              "Tags": "Information technology,It"
            }
          ]
        }', true);

        }
        // $temp_response = json_decode('{
        //   "recommended_candidates": [
        //     {
        //       "Education": "",
        //       "Email": "sagar.saxena.min17@itbhu.ac.in",
        //       "Experience": "",
        //       "LinkedIn": "",
        //       "Name": "sagar saxena",
        //       "Phone No": "7237971138",
        //       "Skillset": "Net,Data analytics,It,Analytics,C/c++,Data,Engineering,Python,Technology,R,C,Digital,Development,Operations,System,C++,Software,Software development",
        //       "Tags": "It,Music"
        //     },
        //     {
        //       "Education": "BTech",
        //       "Email": "17uec069@lnmiit.ac.in",
        //       "Experience": "",
        //       "LinkedIn": "",
        //       "Name": "mansi mittal",
        //       "Phone No": "918559924980",
        //       "Skillset": "Development,Research,Implement,Business,C++,Php,Optimization,Matlab,Technology,Mysql,Develop,Database,Software,Build,It,Seo,Marketing,C,Media,Management,Project,Digital,Software development",
        //       "Tags": "It,Marketing"
        //     },
        //     {
        //       "Education": "BTech",
        //       "Email": "17uec069@lnmiit.ac.in",
        //       "Experience": "",
        //       "LinkedIn": "",
        //       "Name": "mansi mittal",
        //       "Phone No": "918559924980",
        //       "Skillset": "Development,Research,Implement,Business,C++,Php,Optimization,Matlab,Technology,Mysql,Develop,Database,Software,Build,It,Seo,Marketing,C,Media,Management,Project,Digital,Software development",
        //       "Tags": "It,Marketing"
        //     },
        //     {
        //       "Education": "MBA,BCA",
        //       "Email": "kasturisen4998@gmail.com",
        //       "Experience": "",
        //       "LinkedIn": "https://www.linkedin.com/in/",
        //       "Name": "kasturi sen",
        //       "Phone No": "918460620601",
        //       "Skillset": "Design,Requirements,Asp.net,Web,Application,Development,Training,Java,Service,Php,Computer,Technology,Mysql,It,Leadership,C,Management,Software,Etc",
        //       "Tags": "Communications,It"
        //     },
        //     {
        //       "Education": "Btech,BTech",
        //       "Email": "pendliy.reddy.min17@itbhu.ac.in",
        //       "Experience": " PROJECTS Summer Industrial",
        //       "LinkedIn": "",
        //       "Name": "pendli yashwanth",
        //       "Phone No": "916392059890",
        //       "Skillset": "Programming,Engineering,Data structures,Systems,Development,Training,Adobe,Coding,Algorithms,Intern,Data,Microsoft,Photoshop,Word,Support,Powerpoint,Technical,Management,Project,Software,Software development",
        //       "Tags": ""
        //     },
        //     {
        //       "Education": "BE,HSC,SSC",
        //       "Email": "shindetejas1508@gmail.com",
        //       "Experience": " VESIT ",
        //       "LinkedIn": "https://www.linkedin.com/in/tejas-shinde-7ab02b189 github:  https:/",
        //       "Name": "tejas shinde",
        //       "Phone No": "918149636148",
        //       "Skillset": "Design,Web,Python,Inventory,Css,Hadoop,Database design,Application,Development,Spark,Algorithm,Github,Intern,Html,Developer,Java,Django,Switching,Php,Automated,Technology,Mysql,Iot,Oracle,Database,Information technology,Cloudera,Sql,Ups,It,Android,Javascript,Admin,C,Performance,Technical,Verification,System,Management,Project",
        //       "Tags": "Information technology,Mathematics"
        //     },
        //     {
        //       "Education": "HSC",
        //       "Email": "shrynitshangloo18@gmail.com",
        //       "Experience": " S S",
        //       "LinkedIn": "",
        //       "Name": "shrynit shangloo",
        //       "Phone No": "9867693914",
        //       "Skillset": "Inventory,Sales,Development,Research,Intern,Financial,Business,Data,Excel,Reports,Trading,Protocols,Database,Business development,Presentations,Marketing,Media,Pricing,Operations,Management,Benefits",
        //       "Tags": "Economics,Marketing"
        //     },
        //     {
        //       "Education": "BSc",
        //       "Email": "",
        //       "Experience": "",
        //       "LinkedIn": "",
        //       "Name": "curriculum vitae",
        //       "Phone No": "919973160020",
        //       "Skillset": "Programming,Development,Research,Data,Html,R,Statistics,Java,Applications,C++,Mysql,Analysis,Database,Scripting,Marketing,Technical,Media,Project,Software",
        //       "Tags": "Marketing"
        //     },
        //     {
        //       "Education": "MBA,BSc",
        //       "Email": "pgp10snehab@iimrohtak.ac.in",
        //       "Experience": "",
        //       "LinkedIn": "",
        //       "Name": "bharti mba|",
        //       "Phone No": "9873574993",
        //       "Skillset": "Requirements,Android,Excel,Finance,Microsoft,Budgeting,Technical,Writer,Development,Training,Database,Management,Software,Coding",
        //       "Tags": "Cs,Finance"
        //     },
        //     {
        //       "Education": "HSC,SSC,BE,Ms,ME",
        //       "Email": "â€‹karthikkeswani1234@gmail.com",
        //       "Experience": "",
        //       "LinkedIn": "",
        //       "Name": "mahesh keswani",
        //       "Phone No": "9699336323",
        //       "Skillset": "Design,Programming,Google analytics,Git,Web,Python,Css,Azure,Flash,Database design,Application,Development,Voice,Research,Analytics,Data,Html,Microsoft,Developer,Java,Ui,Django,Bootstrap,Library,Php,Technology,Analysis,Database,Oracle,Cloudera,Sql,It,Debugging,Javascript,Mobile,Technical,Network,Big data,System,Management,Project,Cloud",
        //       "Tags": "Information technology,It"
        //     }
        //   ]
        // }', true);


//        print_r($temp_response['recommended_candidates']);

        return view('company/candidates_recommended')
                            ->with('recommended_candidates', $temp_response['recommended_candidates']);

    }






    public function view_user_profile($id){

//        echo $id;
        $user_details=UserPersonalDetails::where('user_id',$id)->get();
        $user_tq_details = UserTechnical::where('user_id', $id)->get('tq_category_details_id');
//        print_r($user_tq_details[0]['tq_category_details_id']);
        $skills_id_array = array();
        $count = 0;
        foreach ($user_tq_details as $skill){
            $skills_id_array[$count] = $skill['tq_category_details_id'];
            $count++;
        }
//        print_r($skills_id_array);
        $skills_name_array = array();
        $count = 0;
        foreach ($skills_id_array as $skill){
            $sub_category = TQCategoryDetails::where('tq_category_details_id', $skill)->get();
            $skills_name_array[$count] = $sub_category[0]['sub_category'];
            $count++;
        }
//        print_r($skills_name_array);

        $user_academics = UserAcademics::where('user_id', $id)->get();

        $user_internships = UserExperiences::where('user_id', $id)->where('is_internship_project', 1)->get();
//        print_r($user_internships);

        $user_projects = UserExperiences::where('user_id', $id)->where('is_internship_project', 0)->get();

//        exit;
        return view('/company/view_user_profile')->with("user_details",$user_details)
            ->with("user_tq_skills", $skills_name_array)
            ->with('user_academics', $user_academics)
            ->with('user_internships', $user_internships)
            ->with('user_projects', $user_projects);
        exit;





//        return view('/template/performance');

    }

  public function show_jobs()
    {

        $jobs=Jobs::where('company_id',1)->get();
//         echo "<pre>";
//        print_r($jobs[0]->job_role);
        return view('company/view_jobs')->with('jobs',$jobs);
//        return view('template/iq')->with('iq',$iq);

    }





    public function addNewCustomTest(){
//        echo "here"; //
        $test=new TQCategoryDetails;
//        $test->stream=$_POST['stream'];
//        echo $stream;
        $test->category =$_POST['category'];
        $test->sub_category=strtoupper($_POST['sub_category']);
//        $first_name=$_POST['first_name'];
//        $lastname=$_POST['last_name'];

//        print_r($first_name);
//        print_r($lastname);
//        echo $test->sub_category; //
//        print_r($test);
        $test->save();
        $tq_category_details_id_var=$test->tq_category_details_id;

        $test_concept=new TQConceptDetails;


        $test_concept->tq_category_details_id=$tq_category_details_id_var;
        $test_concept->level=$_POST['level'];
//        echo $test_concept->tq_category_details_id.$test_concept->level; //


//        print_r($_POST['concept_name']);
//        print_r($_POST['concept_number']);

        $count=sizeof($_POST['concept_name']);
//        echo "<br>"; //
//        echo $count; //

        for($i=0;$i<$count;$i++){
//            echo "<br>";
//            echo "cpp";
            $test_concept->sub_concept=$_POST['concept_name'][$i];

            $test_concept->no_of_questions=$_POST['concept_number'][$i];
//            echo $test_concept->sub_concept."".$test_concept->no_of_questions;  //
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
//            print_r($data);  //
            TQConceptDetails::insert($data);


        }





//        echo "".$lastname."".$first_name;


        return $this->index();

    }







    public function proceedAddQuesForm(Request $request){
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


//        echo "file selected";
//            echo $_POST['ques_file'];
        //insert all details through excel file with concept id
        if($request->hasFile('ques_file')){
//                echo "here";
            $path = $request->file('ques_file')->getRealPath();
//                echo $path;
            $data = Excel::import(new CompanyQuestionsImport, \request()->file('ques_file'));
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
            return view('company/add_manual_question_company')->with('no_of_ques',$ques_count_array)->with('tq_category_details_id', $tq_category_details_id)->with('tq_concept_details_id',$tq_concept_details_id);
        }

    }








    public function saveManualForm(){
        $cid = Session::get('company_id');
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
                    'company_id'=> $cid,
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
                    'company_id'=> $cid,
                    'tq_category_details_id'=>$tq_category_details_id,
                    'tq_concept_details_id'=>$tq_concept_details_id,
                    'is_options_available'=>0,
                    'question_statement'=>$_POST['question_statement'][$i],
                    'correct_opton'=>$_POST['direct_answer'][$i],
                );
            }else{
                return view('company/add_new_question_company');
            }

//            print_r($data); //
            CompanyCustomTQ::insert($data);

        }

        return $this->index();
    }



    public function companyWebinars(){
        $cid = Session::get('company_id');
        $webinar_details = Webinar::where('company_id', $cid)->where('status', 0)->get();

        return view('company/company_webinar_schedule')->with('webinar_details', $webinar_details);
    }

    public function endWebinar($webinar_id){

        Webinar::where('webinar_id', $webinar_id)->update(['status' => 1]);

        return $this->companyWebinars();
    }






}
