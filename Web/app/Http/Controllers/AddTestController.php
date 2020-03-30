<?php

namespace App\Http\Controllers;
use App\AQ;
use App\UserAQ;
use Illuminate\Http\Request;
use Session;
use App\UserTests;

class AddTestController extends Controller
{
    public function index()
    {
        
    }
    public function indexapi()
    {

    }

    public function addNewTest(){
        echo "here";
        $stream=$_POST['stream'];
        echo $stream;
        $category =$_POST['category'];
        $first_name=$_POST['first_name'];
        $lastname=$_POST['last_name'];
    
        print_r($first_name);
        print_r($lastname);
        echo "".$lastname."".$first_name;
    }
}
