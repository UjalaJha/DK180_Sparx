<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login;
use Session;

class LoginController extends Controller
{

    public function store(){

        $user_details = new Login;
        $this->validate(request(), [
            'email_id' => 'required|email',
            'password' => 'required'
        ]);

        $user_details->email_id = $_POST['email_id'];
        $user_details->password = $_POST['password'];

        $user_details->save();

//        $user = Login::create(request(['email_id', 'password']));

//        auth()->login($user);
        return view('landing/index');
    }


    public function login_check()
    {

        $credentials = Login::where('email_id', $_POST['email'])->get();
//        echo "<pre>";
        if ($credentials[0]->password == $_POST['password']) {
//            echo "valid";
            $uid = $credentials[0]->user_id;
//            echo $uid;
            Session::put('user_id', $uid);
            $i = Session::get('user_id');
//            echo $i;
            return view('template/dashboard');
        } else {
            echo "invalid";
        }

    }
}
