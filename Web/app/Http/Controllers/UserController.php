<?php

namespace App\Http\Controllers;

use App\UserPersonalDetails;
use App\UserAcademics;
use App\UserExperiences;
use App\UserTechnical;
use App\UserRatings;
use Session;

use App\IQ;
use App\EQ;
use App\AQ;

use App\UserIQ;
use App\UserEQ;
use App\UserAQ;

use Illuminate\Http\Request;

class UserController extends Controller
{


    public function skills_view(){
//        echo "hi";


        $id = Session::get('user_id');
//        echo $id;
//        exit;
        $user_detail=UserTechnical::where('user_id',$id)->where('test_given',0)->get();
//        if($user_detail){
//            echo "sn";
//        }
//        echo "<pre>";
//        print_r($user_detail);
        $size=sizeof($user_detail);
//        echo $size;
        $count=0;
        $skill_array=array();
        while($count!=$size)
        {
            
            $lan=$user_detail[$count]->language;
//            echo $lan;
            $count+=1;
            array_push($skill_array,$lan);
        }
//        print_r($skill_array);
//        exit;
        $skill_set=implode(",",$skill_array);
//        print_r($skill_set);
        $skill_set=explode(",",$skill_set);
//        print_r($skill_set);
//        exit;
//        echo "snj";
//        $ab=sizeof($skill_set);
//        echo $ab;
//        echo $skill_set[0];
        
        $EmptyTestArray = array_filter($skill_set);

        if (!empty($EmptyTestArray))
          {
            // do some tests on the values in $ArrayOne
            echo "exists";
                    return view('template/tq_instructions')->with("skill_set",$skill_set);


          }
        else
          {
            // Likely not to need an else, 
            // but could return message to user "you entered nothing" etc etc
//            echo "empty";
//            echo "test done";
            return view('/template/aq_instructions');

          }
    }





    public function store()
    {
        //
//        echo "<pre>";
//        print_r($_POST);
//        exit;

        $user_id = Session::get('user_id');

        $user = new UserPersonalDetails;
        $user->user_id = $user_id;
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

            $user_technical_details->user_id = $user_id;
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

            $user_ratings_details->user_id = $user_id;
            $user_ratings_details->language = $value;

            $user_ratings_details->save();

            $user_ratings_details->user_id = "";
            $user_ratings_details->language = "";


            $user_ratings_details = null;


        }



        return view('/template/user');


    }

    public  function storeAcademics(){

        $user_academics = new UserAcademics;
//        echo "<pre>";
//        print_r($_POST);
//        exit;
        $user_id = Session::get('user_id');

        $user_academics->user_id = $user_id;
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


        return view('/template/user');

    }

    public function storeInternship(){


        $user_id = Session::get('user_id');


        $size = count($_POST['company_name']);
//        echo "<pre>";
//        print_r($user_experience->company_name);
//        exit;
        for($i=0; $i<$size; $i++){
//            echo $i;
//            echo $_POST['company_name'][$i];
            $user_experience = new UserExperiences;

            $user_experience->user_id = $user_id;
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


            return view('/template/user');

        }

    }

    public function storeProject(){

        $size = count($_POST['project_name']);

//        $user_project->project_name;

        $user_id = Session::get('user_id');

        for($i=0; $i<$size; $i++){
            $user_project = new UserExperiences;

            $user_project->user_id = $user_id;
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

            return view('/template/user');

        }

    }

    public function saveTestScore(){

        $id = Session::get('user_id');

        $iq_score = $_POST['iq_score'];
        $user_iq_score = new UserIQ;
        $user_iq_score->user_id = $id;
        $user_iq_score->iq_score = $iq_score;
        $user_iq_score->save();


        $self_awareness = $_POST['self_awareness'];
        $self_control = $_POST['self_control'];
        $achievement_orientation = $_POST['achievement_orientation'];
        $positive_outlook = $_POST['positive_outlook'];
        $inspirational_leadership = $_POST['inspirational_leadership'];
        $social_awareness = $_POST['social_awareness'];
        $user_eq_score = new UserEQ;
        $user_eq_score->user_id = $id;
        $user_eq_score->eq_self_awareness = $self_awareness;
        $user_eq_score->eq_self_control = $self_control;
        $user_eq_score->eq_achievement_orientation = $achievement_orientation;
        $user_eq_score->eq_positive_outlook = $positive_outlook;
        $user_eq_score->eq_inspirational_leadership = $inspirational_leadership;
        $user_eq_score->eq_social_awareness = $social_awareness;
        $user_eq_score->save();



        $persistence = $_POST['persistence'];
        $boldness = $_POST['boldness'];
        $complexity = $_POST['complexity'];
        $abstraction = $_POST['abstraction'];
        $curiosity = $_POST['curiosity'];
        $user_aq_score = new UserAQ;
        $user_aq_score->user_id = $id;
        $user_aq_score->aq_persistence = $persistence;
        $user_aq_score->aq_boldness = $boldness;
        $user_aq_score->aq_complexity = $complexity;
        $user_aq_score->aq_abstraction = $abstraction;
        $user_aq_score->aq_curiosity = $curiosity;
        $user_aq_score->save();

        return view('/template/performance');

    }

}
