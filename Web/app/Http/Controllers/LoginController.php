<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login;
use Session;
use Hash;
use URL;
use App\UserTests;

class LoginController extends Controller
{

    public function store(){

        $user_details = new Login;
        $this->validate(request(), [
            'email_id' => 'required|email',
            'password' => 'required'
        ]);

//        $hashed = Hash::make($_POST['password']);
        $hashed = password_hash($_POST['password'],PASSWORD_DEFAULT);

        $user_details->email_id = $_POST['email_id'];
        $user_details->password = $hashed;

        $user_details->save();

//        $user = Login::create(request(['email_id', 'password']));

//        auth()->login($user);

        $user_id = Login::where('email_id',$_POST['email_id'])->pluck('user_id');

        $user_id_last = 0;
        foreach ($user_id as $user){
            $user_id_last = $user;
        }
//        echo $user_id_last;

        $user_tests = new UserTests();
        $user_tests->user_id = $user_id_last;
        $user_tests->save();

        return view('landing/index');
    }


    public function login_check()
    {
        if(empty($_POST['email'])){
            echo "invalid";
            return view('landing/login');
            exit();
        }
        $credentials = Login::where('email_id', $_POST['email'])->get();
//        echo "<pre>";
        if (!empty($credentials)) {
            if(password_verify($_POST['password'],$credentials[0]->password)) {
//            echo "valid";
                $uid = $credentials[0]->user_id;
//            echo $uid;
                Session::put('user_id', $uid);
                $i = Session::get('user_id');
//            echo $i;
//                return view('template/dashboard');
//                $url = URL::route('view_dashboard');
//                Redirect::to($url);
//                return redirect()->route('view_dashboard/');
//                return redirect()->action('UserController@redirectDashboard');
                return app('App\Http\Controllers\UserController')->redirectDashboard();

            }else{
                echo "wrong password";
            }
        } else {
            echo "invalid";
            echo bcrypt($_POST['password']);
            return view('landing/login');
            exit();
        }

    }
}
