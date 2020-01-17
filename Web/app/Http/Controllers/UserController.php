<?php

namespace App\Http\Controllers;

use App\UserPersonalDetails;
use App\UserAcademics;
use App\UserExperiences;
use App\UserTechnical;
use App\UserRatings;

use Illuminate\Http\Request;

class UserController extends Controller
{




    public function skills_view($id){
//        echo "hi";
//

        $user_detail=UserPersonalDetails::where('user_id',$id)->get();
//        if($user_detail){
//            echo "sn";
//        }
//        echo "<pre>";
//        print_r($user_detail[0]->skills);
        $skill_set=explode(",",$user_detail[0]->skills);
//        print_r($skill_set);
        return view('template/tq_instructions')->with("skill_set",$skill_set);
//        exit;


//        $jobs=Jobs::where('company_id',1)->get();
////         echo "<pre>";
////        print_r($jobs[0]->job_role);
//        return view('company/view_jobs')->with('jobs',$jobs)
    }





    public function store()
    {
        //
//        echo "<pre>";
//        print_r($_POST);
//        exit;

        $user = new UserPersonalDetails;
        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];
        $user->age = $_POST['age'];
        $user->gender = $_POST['gender'];
        $user->email_id = $_POST['email_id'];
        $user->contact_number = $_POST['contact_number'];
        $user->address = $_POST['address'];
        $user->city = $_POST['city'];
        $user->country = $_POST['country'];
        $user->postal_code = $_POST['postal_code'];

        $string='';
        foreach ($_POST['skills'] as $value){
            $string .=  $value.',';
        }
        $user->skills = $string;
        $user->linkedin_id = $_POST['linkedin_id'];
        $user->github_id = $_POST['github_id'];
        $user->other_links = $_POST['other_links'];
        $user->resume_filename = $_POST['resume_filename'];

        $user->save();

//
//        $file = $request->file('resume_filename');
//        //Display File Name
//        echo 'File Name: '.$file->getClientOriginalName();
//        echo '<br>';
//
//        //Display File Extension
//        echo 'File Extension: '.$file->getClientOriginalExtension();
//        echo '<br>';
//
//        //Display File Real Path
//        echo 'File Real Path: '.$file->getRealPath();
//        echo '<br>';
//
//        //Display File Size
//        echo 'File Size: '.$file->getSize();
//        echo '<br>';
//
//        //Display File Mime Type
//        echo 'File Mime Type: '.$file->getMimeType();
//
//        //Move Uploaded File
//        $destinationPath = 'uploads';
//        $file->move($destinationPath,$file->getClientOriginalName());






        foreach ($_POST['skills'] as $value){
            $user_technical_details = new UserTechnical;

            $user_technical_details->user_id = 1;
            $user_technical_details->language = $value;
            $user_technical_details->language_score = 0;
            $user_technical_details->test_given = 0;

            $user_technical_details->save();

            $user_technical_details->user_id = "";
            $user_technical_details->language = "";
            $user_technical_details->language_score = "";
            $user_technical_details->test_given = "";

            $user_technical_details = null;


        }



        foreach ($_POST['skills'] as $value){
            $user_ratings_details = new UserRatings;

            $user_ratings_details->user_id = 1;
            $user_ratings_details->language = $value;

            $user_ratings_details->save();

            $user_ratings_details->user_id = "";
            $user_ratings_details->language = "";


            $user_ratings_details = null;


        }





    }

    public  function storeAcademics(){

        $user_academics = new UserAcademics;
//        echo "<pre>";
//        print_r($_POST);
//        exit;

        $user_academics->x_school_name = $_POST['x_school_name'];
        $user_academics->x_board_name = $_POST['x_board_name'];
        $user_academics->x_year_of_completion = $_POST['x_year_of_completion'];
        $user_academics->is_x_gpa_percentage = $_POST['is_x_gpa_percentage'];
        $user_academics->x_gpa_percentage = $_POST['x_gpa_percentage'];

        $user_academics->xii_school_name = $_POST['xii_school_name'];
        $user_academics->xii_board_name = $_POST['xii_board_name'];
        $user_academics->xii_year_of_completion = $_POST['xii_year_of_completion'];
        $user_academics->is_xii_gpa_percentage = $_POST['is_xii_gpa_percentage'];
        $user_academics->xii_gpa_percentage = $_POST['xii_gpa_percentage'];

        $user_academics->ug_university_name = $_POST['ug_university_name'];
        $user_academics->ug_college_name = $_POST['ug_college_name'];
        $user_academics->ug_course_name = $_POST['ug_course_name'];
        $user_academics->ug_year_of_graduation = $_POST['ug_year_of_graduation'];
        $user_academics->is_ug_gpa_percentage = $_POST['is_ug_gpa_percentage'];
        $user_academics->ug_average_gpi = $_POST['ug_average_gpi'];

        $user_academics->save();


    }

    public function storeInternship(){


        $size = count($_POST['company_name']);
//        echo "<pre>";
//        print_r($user_experience->company_name);
//        exit;
        for($i=0; $i<$size; $i++){
//            echo $i;
//            echo $_POST['company_name'][$i];
            $user_experience = new UserExperiences;

            $user_experience->is_internship_project = 1;
            $user_experience->company_name = $_POST['company_name'][$i];
            $user_experience->project_name = $_POST['project_name'][$i];
            $user_experience->role = $_POST['role'][$i];
            $user_experience->duration = $_POST['duration'][$i];
            $user_experience->domain = $_POST['domain'][$i];
            $user_experience->tech_stack = $_POST['tech_stack'][$i];


            $user_experience->save();

            $user_experience->company_name = "";
            $user_experience->project_name = "";
            $user_experience->role = "";
            $user_experience->duration = "";
            $user_experience->domain = "";
            $user_experience->tech_stack = "";

            $user_experience = null;


        }

    }

    public function storeProject(){

        $size = count($_POST['project_name']);

//        $user_project->project_name;


        for($i=0; $i<$size; $i++){
            $user_project = new UserExperiences;

            $user_project->project_name = $_POST['project_name'][$i];
            $user_project->role = $_POST['role'][$i];
            $user_project->domain = $_POST['domain'][$i];
            $user_project->duration = $_POST['duration'][$i];
            $user_project->tech_stack = $_POST['tech_stack'][$i];


            $user_project->save();

            $user_project->project_name = "";
            $user_project->role = "";
            $user_project->domain = "";
            $user_project->duration = "";
            $user_project->tech_stack = "";

            $user_project = null;


        }

    }

}
