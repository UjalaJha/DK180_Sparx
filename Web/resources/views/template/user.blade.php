<!--
=========================================================
 Material Dashboard - v2.1.1
=========================================================

 Product Page: https://www.creative-tim.com/product/material-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/material-dashboard/blob/master/LICENSE.md)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Material Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />

  <!--select2 css-->
  <link rel="stylesheet" href="../assets/select2/css/select2.min.css">

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->

  <style type="text/css">
    /*@import "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css";*/

    /* Select2 css */
    @import "http://propeller.in/components/select2/css/select2.min.css";
    @import "http://propeller.in/components/select2/css/select2-bootstrap.css";

    /* Propeller typography */
    @import "http://propeller.in/components/typography/css/typography.css";

    /* Propeller text fields */
    @import "http://propeller.in/components/textfield/css/textfield.css";

    /* Propeller select2 */
    @import "http://propeller.in/components/select2/css/pmd-select2.css";
  </style>
</head>

<body class="">
<div class="wrapper ">
  <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
      <a href="http://www.creative-tim.com" class="simple-text logo-normal">
        HIRECONNECT
      </a>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item  ">
          <a class="nav-link" href="./dashboard.html">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item active ">
          <a class="nav-link" href="./user.html">
            <i class="material-icons">person</i>
            <p>User Profile</p>
          </a>
        </li>

        <li class="nav-item ">
          <a class="nav-link" href="./performance">
            <i class="material-icons">content_paste</i>
            <p>My Performance</p>
          </a>
        </li>

        <li class="nav-item ">
          <a class="nav-link" href="./notifications.html">
            <i class="material-icons">notifications</i>
            <p>Notifications</p>
          </a>
        </li>

        <li class="nav-item active-pro ">
          <a class="nav-link" href="./upgrade.html">
            <i class="material-icons">unarchive</i>
            <p>Upgrade to PRO</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
      <div class="container-fluid">
        <div class="navbar-wrapper">
          <a class="navbar-brand" href="#pablo">User Profile</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
          <form class="navbar-form">
            <div class="input-group no-border">
              <input type="text" value="" class="form-control" placeholder="Search...">
              <button type="submit" class="btn btn-white btn-round btn-just-icon">
                <i class="material-icons">search</i>
                <div class="ripple-container"></div>
              </button>
            </div>
          </form>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#pablo">
                <i class="material-icons">dashboard</i>
                <p class="d-lg-none d-md-block">
                  Stats
                </p>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">notifications</i>
                <span class="notification">5</span>
                <p class="d-lg-none d-md-block">
                  Some Actions
                </p>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Mike John responded to your email</a>
                <a class="dropdown-item" href="#">You have 5 new tasks</a>
                <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                <a class="dropdown-item" href="#">Another Notification</a>
                <a class="dropdown-item" href="#">Another One</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">person</i>
                <p class="d-lg-none d-md-block">
                  Account
                </p>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                <a class="dropdown-item" href="#">Profile</a>
                <a class="dropdown-item" href="#">Settings</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Log out</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="card">
              <div class="card-header card-header-tabs card-header-primary">
                <div class="nav-tabs-navigation">
                  <div class="nav-tabs-wrapper">
                    <!-- <span class="nav-tabs-title">Tasks:</span> -->

                    <ul class="nav nav-tabs" data-tabs="tabs">
                      <li class="nav-item" style="margin-left:5%">
                        <a class="nav-link active" href="#profile" data-toggle="tab">
                          <i class="material-icons">person</i> Personal Information
                          <div class="ripple-container"></div>
                        </a>
                      </li>
                      <li class="nav-item" style="margin-left:5%">
                        <a class="nav-link" href="#messages" data-toggle="tab">
                          <i class="material-icons">equalizer</i>Academics and Achievements
                          <div class="ripple-container"></div>
                        </a>
                      </li>
                      <li class="nav-item" style="margin-left:5%">
                        <a class="nav-link" href="#settings" data-toggle="tab">
                          <i class="material-icons">work</i>Internship Details
                          <div class="ripple-container"></div>
                        </a>
                      </li>
                      <li class="nav-item" style="margin-left:5%">
                        <a class="nav-link" href="#project" data-toggle="tab">
                          <i class="material-icons">code</i>Project Details
                          <div class="ripple-container"></div>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="profile">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="card">

                          <div class="card-body">
                            <form action="/personal_details" method="post">
                              @csrf
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">First Name</label>
                                    <input type="text" class="form-control" name="first_name">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">Last Name</label>
                                    <input type="text" class="form-control" name="last_name">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <!-- <div class="form-group"> -->
                                    <!-- <label for="sel1">Gender</label> -->

                                    <select class="form-control" style="color:#aaa;margin-top: -5px;" id="sel1" name="gender">
                                      <option class="disabled" style="color:#aaa;">Gender</option>
                                      <option>Male</option>
                                      <option>Female</option>
                                      <option>Others</option>
                                      <!-- <option>4</option> -->
                                    </select>
                                    <!-- </div> -->
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">Age</label>
                                    <input type="number" class="form-control" name="age" min="18" max="100">
                                  </div>
                                </div>
                              </div>


                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">Email address</label>
                                    <input type="email" class="form-control" name="email_id">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">Contact No</label>
                                    <input type="text" class="form-control" name="contact_number">
                                  </div>
                                </div>

                              </div>



                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">Address</label>
                                    <input type="text" class="form-control" name="address">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">City</label>
                                    <input type="text" class="form-control" name="city">
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">Country</label>
                                    <input type="text" class="form-control" name="country">
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">Postal Code</label>
                                    <input type="text" class="form-control" name="postal_code">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <!-- <div class="form-group"> -->
                                    <!-- <label for="sel1">Gender</label> -->

                                    <select name="skills[]" id="skill_select" multiple="multiple" class="form-control" name="skills">
                                      <option value="C">C</option>
                                      <option value="Java">Java</option>
                                      <option value="C++">C++</option>
                                      <option value="Python">Python</option>
                                      <option value="Sql">Sql</option>

                                    </select>
                                    <!-- </div> -->
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">Github Link</label>
                                    <input type="text" class="form-control" name="github_id">
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">LinkedIn Link</label>
                                    <input type="text" class="form-control" name="linkedin_id">
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">Other Links</label>
                                    <input type="text" class="form-control" name="other_links">
                                  </div>
                                </div>






                              </div>


                              <div class="row" style="margin-top:10px;">
                                <div class="col-md-12">
                                  <!-- <b><p >Upload Resume</p></b> -->
                                  <b><span style="margin-right:10px;color:purple">Upload Resume : </span></b><span><input type="file" id="myFile" name="resume_filename"></span>
                                </div>

                              </div>

                              <button type="submit" class="btn btn-primary pull-right">Submit Profile</button>
                              <div class="clearfix"></div>
                            </form>

                          </div>
                        </div>
                      </div>

                    </div>



                  </div>
                  <div class="tab-pane" id="messages">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="card">

                          <div class="card-body">
                            <form action="/academics" method="post">
                              @csrf
                              <b><h5 style="color:purple;margin-top:10px;font-weight:bold;">School Information Details</h5></b>

                              <div class="row">

                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">School Name</label>
                                    <input type="text" class="form-control" name="x_school_name">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">Board</label>
                                    <input type="text" class="form-control" name="x_board_name">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-2" style="margin-top: 10px;">
                                  <div class="form-group">
                                    <input type="radio" id="defaultRadio" name="is_x_gpa_percentage" value="2">
                                    <label for="defaultRadio">Percentage</label>
                                    <input type="radio" id="defaultRadio" name="is_x_gpa_percentage" valuw="1" style="margin-left: 10px;">
                                    <label for="defaultRadio">CGPI</label>
                                  </div>
                                </div>
                                <div class="col-md-5">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">Year of Completion</label>
                                    <input type="text" class="form-control" name="x_year_of_completion">
                                  </div>
                                </div>
                                <div class="col-md-5">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">Marks</label>
                                    <input type="text" class="form-control" name="x_gpa_percentage">
                                  </div>
                                </div>

                              </div>
                              <hr style="background: purple">
                              <b><h5 style="color:purple;margin-top:10px;font-weight:bold;">Higher Secondary Information Details</h5></b>
                              <div class="row">

                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">College Name</label>
                                    <input type="text" class="form-control" name="xii_school_name">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">Board</label>
                                    <input type="text" class="form-control" name="xii_board_name">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-2" style="margin-top: 10px;">
                                  <div class="form-group">
                                    <input type="radio" id="defaultRadio" name="is_xii_gpa_percentage" value="2">
                                    <label for="defaultRadio">Percentage</label>
                                    <input type="radio" id="defaultRadio" name="is_xii_gpa_percentage" value="1" style="margin-left: 10px;">
                                    <label for="defaultRadio">CGPI</label>
                                  </div>
                                </div>
                                <div class="col-md-5">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">Year of Completion</label>
                                    <input type="text" class="form-control" name="xii_year_of_completion">
                                  </div>
                                </div>
                                <div class="col-md-5">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">Marks</label>
                                    <input type="text" class="form-control" name="xii_gpa_percentage">
                                  </div>
                                </div>

                              </div><hr style="background: purple">
                              <b><h5 style="color:purple;margin-top:10px;font-weight:bold;">Under Graduate Information Details</h5></b>
                              <div class="row">

                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">College Name</label>
                                    <input type="text" class="form-control" name="ug_college_name">
                                  </div>
                                </div>

                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">University</label>
                                    <input type="text" class="form-control" name="ug_university_name">
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">Course Name</label>
                                    <input type="text" class="form-control" name="ug_course_name">
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-2" style="margin-top: 10px;">
                                  <div class="form-group">
                                    <input type="radio" id="defaultRadio" name="is_ug_gpa_percentage" value="2">
                                    <label for="defaultRadio">Percentage</label>
                                    <input type="radio" id="defaultRadio" name="is_ug_gpa_percentage" value="1" style="margin-left: 10px;">
                                    <label for="defaultRadio">CGPI</label>
                                  </div>
                                </div>
                                <div class="col-md-5">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">Year of Completion</label>
                                    <input type="text" class="form-control" name="ug_year_of_graduation">
                                  </div>
                                </div>
                                <div class="col-md-5">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">Marks</label>
                                    <input type="text" class="form-control" name="ug_average_gpi">
                                  </div>
                                </div>


                              </div>

                              <button type="submit" class="btn btn-primary pull-right">Submit Profile</button>
                              <div class="clearfix"></div>

                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="tab-pane" id="settings">
                    <div class="row">
                      <!-- <b><h5 style="color:purple;margin-top:10px;font-weight:bold;">Under Graduate Information Details</h5></b>                          -->
                      <div class="col-md-12">
                        <div class="card">

                          <div class="card-body">
                            <form  name="storeInternship" id="storeInternship">
                            @csrf

                              <b><h5 style="color:purple;margin-top:10px;font-weight:bold;">Internship Details</h5></b>
                              <div class="row" id="internship1" name="internship1">
                                <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="bmd-label-floating">Company Name</label>
                                        <input type="text" class="form-control" name="company_name[]">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="bmd-label-floating">Project Name</label>
                                        <input type="text" class="form-control" name="project_name[]">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="bmd-label-floating">Role</label>
                                        <input type="text" class="form-control" name="role[]">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="bmd-label-floating">Duration</label>
                                        <input type="text" class="form-control" name="duration[]">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">

                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="bmd-label-floating">Domain</label>
                                        <input type="text" class="form-control" name="domain[]">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="bmd-label-floating">Technology Stack</label>
                                        <input type="text" class="form-control" name="tech_stack[]">
                                      </div>
                                    </div>
                                  </div>
                                  <hr>
                                </div>
                              </div>


                              <!-- <a  href="#">Add Email Field</a> -->

                              <button id="addinternship" type="submit" class="btn btn-info">Add more</button>
                              <button type="submit" class="btn btn-primary pull-right" name="submitInternship" id="submitInternship">Submit Profile</button>
                              <div class="clearfix"></div>

                            </form>

                          </div>
                        </div>
                      </div>

                    </div>

                  </div>

                  <div class="tab-pane" id="project">
                    <div class="row">
                      <!-- <b><h5 style="color:purple;margin-top:10px;font-weight:bold;">Under Graduate Information Details</h5></b>                          -->
                      <div class="col-md-12">
                        <div class="card">

                          <div class="card-body">
                            <form name="storeProject" id="storeProject">
                              @csrf
                              <b><h5 style="color:purple;margin-top:10px;font-weight:bold;">Project Details</h5></b>
                              <div class="row" id="project1" name="project1">
                                <div class="col-md-12">

                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="bmd-label-floating">Project Name</label>
                                        <input type="text" class="form-control" name="project_name[]">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="bmd-label-floating">Your Contribution</label>
                                        <input type="text" class="form-control" name="role[]">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="bmd-label-floating">Domain</label>
                                        <input type="text" class="form-control" name="domain[]">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="bmd-label-floating">Duration</label>
                                        <input type="text" class="form-control" name="duration[]">
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="bmd-label-floating">Technology Stack</label>
                                        <input type="text" class="form-control" name="tech_stack[]">
                                      </div>
                                    </div>
                                  </div>
                                  <hr>



                                </div>
                              </div>


                              <!-- <a  href="#">Add Email Field</a> -->

                              <button id="addproject" type="submit" class="btn btn-info">Add more</button>
                              <button type="submit" class="btn btn-primary pull-right" id="submitProject" name="submitProject">Submit Profile</button>
                              <div class="clearfix"></div>

                            </form>
                          </div>
                        </div>
                      </div>

                    </div>

                  </div>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

</div>
</div>
<footer class="footer">
  <div class="container-fluid">
    <nav class="float-left">
      <ul>
        <li>
          <a href="https://www.creative-tim.com">
            Creative Tim
          </a>
        </li>
        <li>
          <a href="https://creative-tim.com/presentation">
            About Us
          </a>
        </li>
        <li>
          <a href="http://blog.creative-tim.com">
            Blog
          </a>
        </li>
        <li>
          <a href="https://www.creative-tim.com/license">
            Licenses
          </a>
        </li>
      </ul>
    </nav>
    <div class="copyright float-right">
      &copy;
      <script>
        document.write(new Date().getFullYear())
      </script>, made with <i class="material-icons">favorite</i> by
      <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
    </div>
  </div>
</footer>
</div>
</div>

<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap-material-design.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Plugin for the momentJs  -->
<script src="../assets/js/plugins/moment.min.js"></script>
<!--  Plugin for Sweet Alert -->
<script src="../assets/js/plugins/sweetalert2.js"></script>
<!-- Forms Validations Plugin -->
<script src="../assets/js/plugins/jquery.validate.min.js"></script>
<!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
<script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="../assets/js/plugins/fullcalendar.min.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="../assets/js/plugins/jquery-jvectormap.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Library for adding dinamically elements -->
<script src="../assets/js/plugins/arrive.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chartist JS -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> -->
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/demo/demo.js"></script>

<script>
  $(document).ready(function() {
    $().ready(function() {
      $sidebar = $('.sidebar');

      $sidebar_img_container = $sidebar.find('.sidebar-background');

      $full_page = $('.full-page');

      $sidebar_responsive = $('body > .navbar-collapse');

      window_width = $(window).width();

      fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

      if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
        if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
          $('.fixed-plugin .dropdown').addClass('open');
        }

      }

      $('.fixed-plugin a').click(function(event) {
        // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
        if ($(this).hasClass('switch-trigger')) {
          if (event.stopPropagation) {
            event.stopPropagation();
          } else if (window.event) {
            window.event.cancelBubble = true;
          }
        }
      });


      $('.fixed-plugin .active-color span').click(function() {
        $full_page_background = $('.full-page-background');

        $(this).siblings().removeClass('active');
        $(this).addClass('active');

        var new_color = $(this).data('color');

        if ($sidebar.length != 0) {
          $sidebar.attr('data-color', new_color);
        }

        if ($full_page.length != 0) {
          $full_page.attr('filter-color', new_color);
        }

        if ($sidebar_responsive.length != 0) {
          $sidebar_responsive.attr('data-color', new_color);
        }
      });

      $('.fixed-plugin .background-color .badge').click(function() {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');

        var new_color = $(this).data('background-color');

        if ($sidebar.length != 0) {
          $sidebar.attr('data-background-color', new_color);
        }
      });

      $('.fixed-plugin .img-holder').click(function() {
        $full_page_background = $('.full-page-background');

        $(this).parent('li').siblings().removeClass('active');
        $(this).parent('li').addClass('active');


        var new_image = $(this).find("img").attr('src');

        if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
          $sidebar_img_container.fadeOut('fast', function() {
            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $sidebar_img_container.fadeIn('fast');
          });
        }

        if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
          var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

          $full_page_background.fadeOut('fast', function() {
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
            $full_page_background.fadeIn('fast');
          });
        }

        if ($('.switch-sidebar-image input:checked').length == 0) {
          var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
          var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

          $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
          $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
        }

        if ($sidebar_responsive.length != 0) {
          $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
        }
      });

      $('.switch-sidebar-image input').change(function() {
        $full_page_background = $('.full-page-background');

        $input = $(this);

        if ($input.is(':checked')) {
          if ($sidebar_img_container.length != 0) {
            $sidebar_img_container.fadeIn('fast');
            $sidebar.attr('data-image', '#');
          }

          if ($full_page_background.length != 0) {
            $full_page_background.fadeIn('fast');
            $full_page.attr('data-image', '#');
          }

          background_image = true;
        } else {
          if ($sidebar_img_container.length != 0) {
            $sidebar.removeAttr('data-image');
            $sidebar_img_container.fadeOut('fast');
          }

          if ($full_page_background.length != 0) {
            $full_page.removeAttr('data-image', '#');
            $full_page_background.fadeOut('fast');
          }

          background_image = false;
        }
      });

      $('.switch-sidebar-mini input').change(function() {
        $body = $('body');

        $input = $(this);

        if (md.misc.sidebar_mini_active == true) {
          $('body').removeClass('sidebar-mini');
          md.misc.sidebar_mini_active = false;

          $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

        } else {

          $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

          setTimeout(function() {
            $('body').addClass('sidebar-mini');

            md.misc.sidebar_mini_active = true;
          }, 300);
        }

        // we simulate the window Resize so the charts will get updated in realtime.
        var simulateWindowResize = setInterval(function() {
          window.dispatchEvent(new Event('resize'));
        }, 180);

        // we stop the simulation of Window Resize after the animations are completed
        setTimeout(function() {
          clearInterval(simulateWindowResize);
        }, 1000);

      });
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.mdb-select').materialSelect();
  });
</script>
<script>
  // Add the following code if you want the name of the file appear on select
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
</script>
<script type="text/javascript">
  jQuery(function($){
    var $internship = $('#internship1'), count = 1;
    $('#addinternship').click(function(e){
      e.preventDefault();
      var idname = 'internship' + (++count);
      $internship.parent().append($internship.clone().attr({id: idname, name: idname}));
    });

  });
</script>
<script type="text/javascript">
  jQuery(function($){
    var $project = $('#project1'), count = 1;
    $('#addproject').click(function(e){
      e.preventDefault();
      var idname = 'project' + (++count);
      $project.parent().append($project.clone().attr({id: idname, name: idname}));
    });

  });
</script>


<script src="../../assets/select2/js/select2.min.js"></script>

<script>

  jQuery(document).ready(function() {

    $("#skill_select").select2({
      multiple: true,
      placeholder: "Add your Skills",

    });


  });

</script>

<script>
  $('#submitInternship').click(function(){
    $.ajax({
      url:"/internship",
      method:"POST",
      data:$('#storeInternship').serialize(),
      success:function(data)
      {
        alert(data);
        $('#storeInternship')[0].reset();
      }
    });
  });
</script>

<script>
  $('#submitProject').click(function(){
    $.ajax({
      url:"/project",
      method:"POST",
      data:$('#storeProject').serialize(),
      success:function(data)
      {
        alert(data);
        $('#storeProject')[0].reset();
      }
    });
  });
</script>

</body>

</html>
