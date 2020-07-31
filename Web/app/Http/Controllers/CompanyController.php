<?php

namespace App\Http\Controllers;

use App\TQCategoryDetails;
use App\UserAcademics;
use App\UserExperiences;
use App\UserPersonalDetails;
use App\UserTechnical;
use Illuminate\Http\Request;

use Session;
use App\Jobs;
use App\CompanyDetails;

class CompanyController extends Controller
{
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

        // curl_setopt_array($curl, array(
        //   CURLOPT_URL => "http://f1d65fe95099.ngrok.io/candidate_api",
        //   CURLOPT_RETURNTRANSFER => true,
        //   CURLOPT_ENCODING => "",
        //   CURLOPT_MAXREDIRS => 10,
        //   CURLOPT_TIMEOUT => 0,
        //   CURLOPT_FOLLOWLOCATION => true,
        //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //   CURLOPT_CUSTOMREQUEST => "POST",
        //   CURLOPT_POSTFIELDS =>$json,
        //   CURLOPT_HTTPHEADER => array(
        //     "Content-Type: application/json"
        //   ),
        // ));

        // $response = curl_exec($curl);
        // curl_close($curl);

        // // $jsonDecode = json_decode(trim($jsonData), TRUE);
        // // echo $response;
//        echo "<pre>";
        // print_r(json_decode($response, TRUE));
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


}
