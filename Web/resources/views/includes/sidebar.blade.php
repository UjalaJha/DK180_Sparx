<?php
// use Session;
// $page=Session::get('page');
// echo $page;
 // <?php 
// if($page=='view_profile'){echo "active";} 

?>
<!-- // exit; -->
?>
<body class="">
  
<div class="wrapper " style="height: 0px;">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
       <div class="logo">
        <img src="../assets/img/logo.png" width="250px" height="70px">
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="/view_dashboard">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/profile">
              <i class="material-icons">person</i>
              <p>User Profile</p>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="/user">
              <i class="material-icons">create</i>
              <p>Update Profile</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/performance_report">
              <i class="material-icons">content_paste</i>
              <p>My Performance</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./look_for_jobs">
              <i class="material-icons">find_in_page</i>
              <p>Look for Companies</p>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="./learningrecommendation">
              <i class="material-icons">school</i>
              <p>Recommended Courses</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./blogrecommendation">
              <i class="material-icons">article</i>
              <p>Blogs</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/upcoming_webinars">
              <i class="material-icons">content_paste</i>
              <p>Attend Webinars</p>
            </a>
          </li>
         
        </ul>
      </div>
    </div>
  </div>
