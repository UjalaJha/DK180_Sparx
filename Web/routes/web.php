<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('new_landing/index');
});
Route::get('/about', function () {
    return view('new_landing/about');
});
Route::get('/contact', function () {
    return view('new_landing/contact');
});
Route::get('/chatbot', function () {
    return view('new_landing/chatbot');
});

Route::get('/test','TestControler@index');

Route::post('save_iq_score','TestControler@storeIQ');

Route::get('/test/{id}','TestControler@show');
Route::get('/login', function () {
    return view('landing/login');
});
Route::get('/signup', function () {
    return view('landing/signup');
});

Route::get('/company_signup', function () {
    return view('landing/company-signup');
});
Route::get('/viewcerti', function () {
    return view('E-certificate/index');
});
Route::post('/register', 'LoginController@store');
Route::post('/company_register', 'LoginController@storeCompany');



Route::get('/logout', 'LoginController@logout');


Route::get('/view_dashboard', 'UserController@redirectDashboard');
Route::get('/instructions', function () {
    return view('template/instructions');
});
Route::get('/eq_instructions', function () {
    return view('template/eq_instructions');
});

Route::get('/aq_instructions', function () {
    return view('template/aq_instructions');
});

Route::get('/user', function (){
    return view('template/preuser');
});

Route::get('/user_profile', function () {
    return view('template/user');
});
Route::get('/my_specializations', function () {
    return view('template/my_specializations');
});
Route::get('/training', function () {
    return view('template/training');
});

Route::post('/user_media','UserController@storeMedia');

Route::post('/personal_details','UserController@store');

Route::post('/academics','UserController@storeAcademics');

Route::post('/internship','UserController@storeInternship');

Route::post('/project','UserController@storeProject');

//ML Model Integration
Route::post('/resume','UserController@resume');

Route::get('/jobrecommendation','UserController@jobrecommendation');

Route::get('/learningrecommendation','UserController@learningrecommendation');

Route::get('/githubjobs','UserController@githubjobs');

Route::get('/blogrecommendation','UserController@blogrecommendation');

Route::get('/learningplatforminsights','UserController@learningplatforminsights');

///sanjay

Route::get('/company_dashboard', function () {
    return view('company/company_dashboard');
});
Route::get('/post_job', function () {
    return view('company/post_job');
});

Route::post('/company_post_job', 'CompanyController@candidaterecommendation');

Route::get('/suggested_students', function () {
    return view('company/suggested_students');
});



Route::get('/search_students', function () {
    return view('company/search_students');
});

Route::get('linkedin_students','UserController@linkedin_profile');



Route::get('view_jobs','CompanyController@show_jobs');
//Route::get('/view_jobs', function () {
//    return view('company/view_jobs');
//});


Route::post('/company','TestControler@companysubmit');




//Route::get('/eq', function () {
//    return view('template/eq');
//});

Route::get('/eq','EQController@index');
Route::get('/eqtest/{id}','EQController@show');

Route::post('save_eq','EQController@storeEQ');

Route::get('/aq','AQController@index');
Route::get('/aqtest/{id}','AQController@show');
Route::post('/save_aq', 'AQController@storeAQ');

Route::get('/tests_done',function (){
    return view('template/submit_test');
});
Route::post('/save_scores','UserController@saveTestScore');


//Route::get('/tq_instructions', function () {
//    return view('template/tq_instructions');
//});

Route::get('/tq_instructions','UserController@skills_view');
Route::get('/advance_tq_instructions','UserController@advance_skills_view');


Route::get('/tech_test/{skill_id}', 'TQController@start_test');
Route::get('/advance_tech_test/{skill_id}', 'TQController@start_advance_test');


Route::get('/tech_test/{skill_id}/{ques_id}','TQController@skill_test');
Route::get('/advance_tech_test/{skill_id}/{ques_id}/','TQController@skill_advance_test');


Route::post('/logins','LoginController@login_check');
Route::post('/company_login','LoginController@company_login_check');


Route::get('/companylogin', function () {
    return view('landing/company-login');
});


Route::get('admin_login', function(){
    return view('landing/admin-login');
});

Route::post('admin_login', 'LoginController@admin_login_check');



Route::get('/save_skill','TQController@save_score');
Route::get('/advance_save_skill','TQController@save_advance_score');



//Route::get('/profile', function () {
//    return view('template/profile');
//});
Route::get('/profile','UserController@view_profile');


Route::get('/performance', function () {
    return view('template/performance');
});


Route::get('/notifications', function () {
    return view('template/notifications');
});

Route::post('/filter','UserController@filter_students');

Route::get('hgmi_instructions', function(){
    return view('template/hgmi_instructions');
});

Route::get('/hgmi', 'HGMIController@index');

Route::post('save_hgmi','HGMIController@storeScore');

Route::get('add_test', function(){
    return view('admin/add_new_test');
});

Route::get('add_question', 'AddQuestionController@index');

Route::post('insert_new_test','AddTestController@addNewTest');

Route::post('proceed_with_add_ques_form', 'AddQuestionController@proceedForm');
Route::post('save_manual_question','AddQuestionController@saveManualForm');

Route::get('getSubCategory/{category_name}','AddQuestionController@getSubCategory');

Route::get('getSubConcept/{sub_category}/{concept}','AddQuestionController@getSubConcept');


//view user details - admin side
Route::get('view_users', function (){
    return view('admin/view_users');
});
Route::get('aicte', function (){
    return view('admin/aicte');
});
Route::get('learning_platform','UserController@learningplatforminsights');


//update skills
Route::post('updateSkills', 'UserController@updateSkills');

/*Excel import export*/
Route::get('export', 'MyController@export')->name('export');
Route::get('importExportView', 'MyController@importExportView');
Route::post('import', 'MyController@import')->name('import');



Route::get('view_user_details/{user_id}', 'CompanyController@view_user_profile');


Route::get('/next_tq_test', function () {
        return app('App\Http\Controllers\UserController')->skills_view();
});

Route::get('/performance_report', function () {
        return app('App\Http\Controllers\UserController')->full_report();
});
// Route::get('performance_report','UsserController@full_report');
Route::get('/dummy_job_role','UserController@dummy_role'); 

Route::get('look_for_jobs', 'UserController@look_for_jobs');




Route::get('custom_test', function(){
    return view('company/add_test');
});

Route::post('insert_new_test_company','CompanyController@addNewCustomTest');
Route::post('proceed_with_add_ques_form_company', 'CompanyController@proceedAddQuesForm');
Route::post('save_manual_question_company','CompanyController@saveManualForm');


//webinar urls

Route::get('upcoming_webinars', 'UserController@upcomingWebinars');

Route::get('attend_webinar', function (){
    return view('template/webinar');
});

Route::get('add_webinar', 'AddQuestionController@addWebinar');
Route::post('submit_new_webinar', 'AddQuestionController@submitWebinar');

Route::get('company_webinars', 'CompanyController@companyWebinars');

Route::get('take_webinar', function (){
    return view('company/webinar_company');
});

Route::get('end_webinar/{webinar_id}', 'CompanyController@endWebinar');

Route::get('send_email/', 'PhpmailerController@sendEmail');

Route::get('campus_drive', function (){
    return view('company/campus_drive');
});

Route::get('/nodegreejob', function () {
    return view('template/nodegreejob');
});




