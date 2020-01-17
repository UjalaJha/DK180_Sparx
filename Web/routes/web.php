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
    return view('landing/index');
});
Route::get('/test','TestControler@index');
Route::get('/test/{id}','TestControler@show');
Route::get('/login', function () {
    return view('landing/login');
});
Route::get('/signup', function () {
    return view('landing/signup');
});

Route::post('/register', 'LoginController@store');

Route::get('/dashboard', function () {
    return view('template/dashboard');
});
Route::get('/instructions', function () {
    return view('template/instructions');
});
Route::get('/eq_instructions', function () {
    return view('template/eq_instructions');
});

Route::get('/aq_instructions', function () {
    return view('template/aq_instructions');
});


Route::get('/user_profile', function () {
    return view('template/user');
});

Route::post('/personal_details','UserController@store');

Route::post('/academics','UserController@storeAcademics');

Route::post('/internship','UserController@storeInternship');

Route::post('/project','UserController@storeProject');



///sanjay

Route::get('/company_dashboard', function () {
    return view('company/company_dashboard');
});
Route::get('/post_job', function () {
    return view('company/post_job');
});

Route::get('/suggested_students', function () {
    return view('company/suggested_students');
});



Route::get('/search_students', function () {
    return view('company/search_students');
});

Route::get('view_jobs','TestControler@show_jobs');
//Route::get('/view_jobs', function () {
//    return view('company/view_jobs');
//});


Route::post('/company','TestControler@companysubmit');




//Route::get('/eq', function () {
//    return view('template/eq');
//});

Route::get('/eq','EQController@index');
Route::get('/eqtest/{id}','EQController@show');

Route::get('/aq','AQController@index');
Route::get('/aqtest/{id}','AQController@show');

Route::get('/tests_done',function (){
    return view('template/submit_test');
});
Route::post('/save_scores','UserController@saveTestScore');


//Route::get('/tq_instructions', function () {
//    return view('template/tq_instructions');
//});

Route::get('/tq_instructions','UserController@skills_view');


Route::get('/tech_test/{skill}/{id}','TQController@skill_test');


Route::post('/logins','LoginController@login_check');



Route::get('/companylogin', function () {
    return view('landing/companylogin');
});
Route::get('/save_skill','TQController@save_score');



Route::get('/profile', function () {
    return view('template/profile');
});

Route::get('/performance', function () {
    return view('template/performance');
});



