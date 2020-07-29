<?php

namespace App\Http\Controllers;

use App\UserPersonalDetails;
use App\UserAcademics;
use App\UserExperiences;
use App\UserTechnical;
use App\UserRatings;
use App\TQCategoryDetails;
use Session;

use App\UserTests;
use App\IQ;
use App\EQ;
use App\AQ;

use App\LinkedinProfiles;
use App\UserIQ;
use App\UserEQ;
use App\UserAQ;

use App\ResumeClassification;

use Illuminate\Http\Request;

class UserController extends Controller
{


    public function redirectDashboard(){
        $id = Session::get('user_id');
//        echo $id;
        $user_test_details = UserTests::where('user_id',$id)->get();
//        $user_test_array = json_decode(json_encode($user_test_details), true);
//         print_r($user_test_array);
        return view('template/dashboard')->with('user_test_details',$user_test_details);

    }


    public function skills_view(){
//        echo "hi";

        $id = Session::get('user_id');
//        echo $id;
//        exit;
        $user_detail=UserTechnical::where('user_id',$id)->where('level_1_test_given',0)->get();
//        if($user_detail){
//            echo "sn";
//        }
//        echo "<pre>";
//        print_r($user_detail);
        $size=sizeof($user_detail);
//        echo $size;
        $count=0;
        $skill_array=array();
        $skill_id_array = array();
        while($count!=$size)
        {

            $skill_name = TQCategoryDetails::where('tq_category_details_id', $user_detail[$count]->tq_category_details_id)->pluck('sub_category')->first();
            $lan=$skill_name;
            $skill_id = $user_detail[$count]->tq_category_details_id;
//            echo $lan;
            $count+=1;
            array_push($skill_array,$lan);
            array_push($skill_id_array, $skill_id);
        }
//        print_r($skill_array);
//        exit;
        $skill_set=implode(",",$skill_array);
        $skill_id_array_set=implode(",",$skill_id_array);
//        print_r($skill_set);
        $skill_set=explode(",",$skill_set);
        $skill_id_array_set=explode(",",$skill_id_array_set);
//        print_r($skill_set);
//        exit;
//        echo "snj";
//        $ab=sizeof($skill_set);
//        echo $ab;
//        echo $skill_set[0];

        $EmptyTestArray1 = array_filter($skill_set);
        $EmptyTestArray2 = array_filter($skill_id_array_set);

        if (!empty($EmptyTestArray1))
        {
            // do some tests on the values in $ArrayOne
            echo "exists";
//            print_r($EmptyTestArray1);
//            print_r($EmptyTestArray2);
            return view('template/tq_instructions')->with("skill_set",$skill_set)->with("skill_id_array_set", $skill_id_array_set);


        }
        else
        {
            // Likely not to need an else,
            // but could return message to user "you entered nothing" etc etc
//            echo "empty";
//            echo "test done";

            $user_id = Session::get('user_id');
            $user_test = UserTests::where('user_id',$user_id)->update(['tq_given'=>1]);
            return app('App\Http\Controllers\UserController')->redirectDashboard();


        }
    }

    public function advance_skills_view(){
//        echo "hi";

        $id = Session::get('user_id');
//        echo $id;
//        exit;
        $user_detail=UserTechnical::where('user_id',$id)->where('level_1_test_given',1)->where('level_2_eligible',1)->where('level_2_test_given',0)->get();
//        if($user_detail){
//            echo "sn";
//        }
//        echo "<pre>";
//        print_r($user_detail);
        $size=sizeof($user_detail);
//        echo $size;
        $count=0;
        $skill_array=array();
        $skill_id_array = array();
        while($count!=$size)
        {

            $skill_name = TQCategoryDetails::where('tq_category_details_id', $user_detail[$count]->tq_category_details_id)->pluck('sub_category')->first();
            $lan=$skill_name;
            $skill_id = $user_detail[$count]->tq_category_details_id;
//            echo $lan;
            $count+=1;
            array_push($skill_array,$lan);
            array_push($skill_id_array, $skill_id);
        }
//        print_r($skill_array);
//        exit;
        $skill_set=implode(",",$skill_array);
        $skill_id_array_set=implode(",",$skill_id_array);
//        print_r($skill_set);
        $skill_set=explode(",",$skill_set);
        $skill_id_array_set=explode(",",$skill_id_array_set);
//        print_r($skill_set);
//        exit;
//        echo "snj";
//        $ab=sizeof($skill_set);
//        echo $ab;
//        echo $skill_set[0];

        $EmptyTestArray1 = array_filter($skill_set);
        $EmptyTestArray2 = array_filter($skill_id_array_set);

        if (!empty($EmptyTestArray1))
        {
            // do some tests on the values in $ArrayOne
            echo "exists";
//            print_r($EmptyTestArray1);
//            print_r($EmptyTestArray2);
            return view('template/advance_tq_instructions')->with("skill_set",$skill_set)->with("skill_id_array_set", $skill_id_array_set);


        }
        else
        {
            // Likely not to need an else,
            // but could return message to user "you entered nothing" etc etc
//            echo "empty";
//            echo "test done";
//            $user_id = Session::get('user_id');
//            $user_test = UserTests::where('user_id',$user_id)->update('tq_given',1);
            return app('App\Http\Controllers\UserController')->redirectDashboard();

        }
    }



    public function storeMedia(Request $request)
    {
        $this->validate($request, [
            'image_filename' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
//        |max:2048

        // echo "in store media func";
        $user_id = Session::get('user_id');

        if ($request->hasFile('image_filename')) {
            $image = $request->file('image_filename');
            $image_name = $user_id.'.'.$image->getClientOriginalExtension();
//            echo $name;
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $image_name);
//        $this->save();
        }

        if ($request->hasFile('resume_filename')) {
            $resume = $request->file('resume_filename');
            $resume_name = $user_id.'.'.$resume->getClientOriginalExtension();
//            echo $name;
            $destinationPath = public_path('/resumes');
            $resume->move($destinationPath, $resume_name);
//        $this->save();
        }

        // $endpoint = "http://localhost:5000/resume_api";
        // $client = new \GuzzleHttp\Client();
        

        // // $response = $client->request('POST', $endpoint, ['query' => [
            
        // //     // 'key2' => $value,
        // // ]]);
        //     // print_r($request->file('image_filename'));
        //     // exit();
        // $file = $request->file('resume_filename');
        // $name = $file->getClientOriginalName();
        // $path = 'C:\\Users\\Ujala Jha\\Downloads\\';
        // $response =  $client->request('POST', $endpoint, [
        //     'multipart' => [
        //         [
        //             'name'     => 'file',
        //             'contents' => file_get_contents($path . $name),
        //             'filename' => $name
        //         ]
        //     ],
        // ]);

        // // url will be: http://my.domain.com/test.php?key1=5&key2=ABC;

        // // $statusCode = $response->getStatusCode();
        // // $content = $response->getBody();

        // // or when your server returns json
        // $content = json_decode($response->getBody(), true);

        // print_r($content) ;
        // exit();
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://resume-extraction.herokuapp.com/resume/parse/",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => array('url' => 'https://www.jobvacancyresult.com/storage/users/resumes/5833_02_Jatin_Acharya%20-%20JATIN%20ACHARYA.pdf'),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo "<pre>";
        print_r(json_decode($response));
        exit();

        return view('template/user')->with('image_name', $image_name)->with('resume_name', $resume_name);
    }


    public function candidaterecommendation()
    {

        // $skills="python-advance,java-basic,machine learning-advance,data science-intermediate,r-intermediate,business analytics-intermediate,sql-advance";
        $skills='';

        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        //   CURLOPT_URL => "http://127.0.0.1:5000/api",
        //   CURLOPT_RETURNTRANSFER => true,
        //   CURLOPT_ENCODING => "",
        //   CURLOPT_MAXREDIRS => 10,
        //   CURLOPT_TIMEOUT => 0,
        //   CURLOPT_FOLLOWLOCATION => true,
        //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //   CURLOPT_CUSTOMREQUEST => "POST",
        //   CURLOPT_POSTFIELDS =>"{\r\n        \"skills\": \"python-advance,java-basic,machine learning-advance,data science-intermediate,r-intermediate,business analytics-intermediate,sql-advance\" \r\n}",
        //   CURLOPT_HTTPHEADER => array(
        //     "Content-Type: application/json"
        //   ),
        // ));

        // $response = curl_exec($curl);

        // curl_close($curl);
        // echo $response;

        $json_string = '{"job profiles":["python/django senior software","data scientist -","database specialist  ","data software engineer","data analytics, nj","sr. data scientist","analyst - python","esri arcgis administrator","mobile sdet  ","data analystics engineer","lead data scientist","senior database administrator"],"jobs":[{"from":"Indeed","job_company":"StartUs Insights","job_id":"93ad1b7f9420a729","job_link":"https://www.indeed.co.in/jobs?q=python/django+senior+software&l=India&start=10&vjk=93ad1b7f9420a729","job_location":"Bengaluru, Karnataka","job_summary":"— Solid understanding of software development principles and best practices.\nBuilding data applications in a product company,.\nWHAT YOU GET IN RETURN: *.","job_title":"Senior Python Developer","posted_date":"21 days ago"},{"from":"Indeed","job_company":"Techversant Infotech Pvt. Ltd.","job_id":"672b77efc079ca85","job_link":"https://www.indeed.co.in/jobs?q=python/django+senior+software&l=India&start=10&vjk=672b77efc079ca85","job_location":"Thiruvananthapuram, Kerala","job_summary":"MVC software pattern and frameworks.\nWork as a member of a team or on their own to deliver high quality and maintainable software solutions, to strict deadlines…","job_title":"Sr. Software Engineer / Software Engineer - ColdFusion","posted_date":"30+ days ago"},{"from":"Indeed","job_company":"HP","job_id":"f19117ec92fc2221","job_link":"https://www.indeed.co.in/jobs?q=lead+data+scientist&l=India&start=10&vjk=f19117ec92fc2221","job_location":"Bengaluru, Karnataka","job_summary":"O Fluent in structured and unstructured data and modern data transformation methodologies.\nO Leads a project team of data science professionals.","job_title":"Data Scientist Sales & Channel","posted_date":"25 days ago"}]}';
        echo "<pre>";
        print_r(json_decode($json_string));
        exit();


    }

    public function jobrecommendation(){
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

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://f1d65fe95099.ngrok.io/candidate_api",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS =>"{\r\n    \"role_title\": \"database\",\r\n    \"company_name\": \"RS Solutions\",\r\n    \"description\" : \"Urgent need of DB designer. Can work from home too.\",\r\n    \"exp\":3, \r\n    \"loc\":\"Delhi\",\r\n    \"salary\":550000,\r\n    \"skills\" : \"NET Framework, ASP, Software Development, software engineer\"\r\n}",
          CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json"
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
        // echo "<pre>";
        // print_r(json_decode($response));
        exit();

    }
    public function store(Request $request)
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
        $user->image_filename = $_POST['image_name'];
        $user->resume_filename = $_POST['resume_name'];

        $user->save();


        //traversy

//        if($request->hasFile('resume_filename')){
//            // Get filename with the extension
//            $filenameWithExt = $request->file('resume_filename')->getClientOriginalName();
//            echo $filenameWithExt;
//            // Get just filename
//            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
//            // Get just ext
//            $extension = $request->file('resume_filename')->getClientOriginalExtension();
//            // Filename to store
//            $fileNameToStore= $filename.'_'.time().'.'.$extension;
//            // Upload Image
//            $path = $request->file('resume_filename')->storeAs('public/resume', $fileNameToStore);
//        } else {
//            $fileNameToStore = 'noimage.jpg';
//            echo "no file";
//        }

        //traversy



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

            $tq_category = TQCategoryDetails::where('sub_category', $value)->pluck('tq_category_details_id')->first();

//            echo $tq_category."-".$value;

            $user_technical_details->user_id = $user_id;
            $user_technical_details->tq_category_details_id = $tq_category;

            $user_technical_details->save();

            $user_technical_details->user_id = "";
            $user_technical_details->tq_category_details_id = "";


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

//        return view('/template/user')->with('user_id',$user_id);




//    }


//    public  function storeAcademics(){

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


//        return view('/template/user')->with('user_id',$user_id);

//    }

//    public function storeInternship(){


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




//            echo "ss";

        }

//        return view('/template/user');

//    }

//    public function storeProject(){
        $size = count($_POST['project_name']);
//        $user_project->project_name;
        $user_id = Session::get('user_id');

//        for($i=0; $i<$size; $i++){
//            $user_project = new UserExperiences;
//
//            $user_project->user_id = $user_id;
//            $user_project->project_name = $_POST['project_name'][$i];
//            echo $user_project->project_name;
//            $user_project->role = $_POST['role'][$i];
//            $user_project->domain = $_POST['domain'][$i];
//            $user_project->duration = $_POST['duration'][$i];
//            $user_project->tech_stack = $_POST['tech_stack'][$i];
//
//            $user_project->save();
////            echo $user_project;
////            echo $user_project->project_name;
//            $user_project->project_name = "";
//            $user_project->role = "";
//            $user_project->domain = "";
//            $user_project->duration = "";
//            $user_project->tech_stack = "";
//
//            echo "hello";
//
////            $user_project = null;
//
//        }


        $i = 0;
//        print_r($_POST);
//        echo "<br>".$_POST["project_name"][0];
//        echo "<br>".count($_POST["project_name"]);
//        for($i=0; $i<count($_POST["project_name"]); $i++){
//            echo $i;
//            $user_project = new UserExperiences;
//            $user_project->project_name = $_POST['project_name'][$i];
//            $user_project->role = $_POST['role'][$i];
//            $user_project->domain = $_POST['domain'][$i];
//            $user_project->duration = $_POST['duration'][$i];
//            $user_project->tech_stack = $_POST['tech_stack'][$i];
//            $user_project->save();
//        }

        $i=count($_POST["project_name"]);
        while($i>0){
            $i--;
//            echo $i;
            $user_project = new UserExperiences;
            $user_project->user_id = $user_id;
            $user_project->project_name = $_POST['project_name'][$i];
            $user_project->role = $_POST['role'][$i];
            $user_project->domain = $_POST['domain'][$i];
            $user_project->duration = $_POST['duration'][$i];
            $user_project->tech_stack = $_POST['tech_stack'][$i];
            $user_project->save();

        }

//        foreach ($_POST as $post){
//            echo $key[$i];
//            echo $value[$i];
//            $i++;
//            echo $_POST["project_name"];

//            $i++;
//            print_r($_POST);
//        }


        return view('/template/user');

    }

    public function saveTestScore(){

        $id = Session::get('user_id');

        $iq_score = $_POST['iq_score'];
        $user_iq_score = new UserIQ;
        $user_iq_score->user_id = $id;
        $user_iq_score->iq_score = $iq_score;
        $user_iq_score->save();

        $user_tech_detail=UserExperiences::where('user_id',$id)->where('is_internship_project',1)->get();
//        echo $user_tech_detail;
        $lang=$user_tech_detail[0]['tech_stack'];
//        echo $lang;
        $tech=UserRatings::where('user_id',$id)->where('language',$lang)->update(['internship_star'=>1]);
//        exit;


//        $user_rating_detail=UserRatings::where('user_id',$id)->get();
//
//                $int=$user_rating_detail[0]['internship_star'];
//                $exp=$user_rating_detail[0]['project_star'];
//                $tec=$user_rating_detail[0]['technical_star'];
//                $tot=$int+$exp+$tec;
//                echo $int.$exp.$tec;
//        echo "<br>";
//        echo $tot;
//                $tech=UserRatings::where('user_id',$id)->where('language',$lang)->update(['total_star'=>$tot]);

//                echo $int;
        $user_tech_detail=UserExperiences::where('user_id',$id)->where('is_internship_project',0)->get();
        $lang=$user_tech_detail[0]['tech_stack'];
        $tech=UserRatings::where('user_id',$id)->where('language',$lang)->update(['project_star'=>1]);
//                exit;
//        $user_tech_detail=UserExperiences::where('user_id',$id)->where('is_internship_project',0)->get();


//                exit;

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
//        echo $iq_score;
//        exit;
        return view('/template/performance')->with("iq_score",$iq_score);


    }
    
    public function view_profile(){
        $id=Session::get('user_id');
        echo $id;
        $user_details=UserPersonalDetails::where('user_id',$id)->get();
        print_r($user_details);
        exit;
        return view('/template/profile')->with("user_details",$user_details);
//        exit;





//        return view('/template/performance');

    }



    public function pyexe(){

        echo "hello ";
//        exit;
        $commnad=escapeshellcmd('snj.py');
        $output=shell_exec($commnad);
        echo $output;
////        echo "here";
//        echo $commnad;
//


        $python = json_decode(`python snj.py`);
        var_dump($python);
    }


    public function filter_students(){

//        $id = Session::get('user_id');
        $branch=$_POST['branch'][0];
        // $exp=$_POST['experience'];
        // echo $exp;
//        exit;

//        echo $branch;
        $resume_class=ResumeClassification::where('branch_classification',$branch)->get();
//        echo $resume_class;

//        $s=$count
//        foreach($resume_class){
////        $data=UserPersonalDetails::where
//            echo "snj";
//        }
//        echo"hello";
//        exit;
        return view('/company/search_students')->with('resume_class',$resume_class);
//        exit;

    }

    public function linkedin_profile(){
        echo "here";
        $linkedin=LinkedinProfiles::all();
        // echo $linkedin;
        // exit;
        return view('/company/linkedin_students')->with('linkedin',$linkedin);

        // exit;
    }

    public function resume(){
        $endpoint = "http://localhost:5000/resume_api";
        $client = new \GuzzleHttp\Client();
        

        $response = $client->request('POST', $endpoint, ['query' => [
            'file' => $_POST['file'], 
            // 'key2' => $value,
        ]]);

        // url will be: http://my.domain.com/test.php?key1=5&key2=ABC;

        // $statusCode = $response->getStatusCode();
        // $content = $response->getBody();

        // or when your server returns json
        $content = json_decode($response->getBody(), true);

        echo $content;
    }
}
