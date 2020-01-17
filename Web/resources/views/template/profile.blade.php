


@include('includes/header')
@include('includes/sidebar')

  <style type="text/css">
     /*@import "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css";*/

/* Select2 css */

#content {
  margin-top: 50px;
  text-align: center;
}

section.timeline-outer {
  width: 80%;
  margin: 0 auto;
}

/*h1.header {
  font-size: 50px;
  line-height: 70px;
}*/
/* Timeline */

.timeline {
  border-left: 8px solid #9229AD;
  border-bottom-right-radius: 2px;
  border-top-right-radius: 2px;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
  color: #333;
  margin: 50px auto;
  /*letter-spacing: 0.5px;*/
  position: relative;
  /*line-height: 1.4em;*/
  padding: 20px;
  list-style: none;
  text-align: left;
}

/*.timeline h1,
.timeline h2,
.timeline h4 {
  font-size: 1.4em;
}*/

.timeline .event {
  border-bottom: 1px solid rgba(160, 160, 160, 0.2);
  padding-bottom: 15px;
  margin-bottom: 20px;
  position: relative;
}

.timeline .event:last-of-type {
  padding-bottom: 0;
  margin-bottom: 0;
  border: none;
}

.timeline .event:before,
.timeline .event:after {
  position: absolute;
  display: block;
  top: 0;
}

.timeline .event:before {
  left: -177.5px;
  color: #212121;
  content: attr(data-date);
  text-align: right;
  /*  font-weight: 100;*/
  
  font-size: 16px;
  min-width: 120px;
}

.timeline .event:after {
  box-shadow: 0 0 0 8px #9229AD;
  left: -30px;
  background: #ffff;
  border-radius: 50%;
  height: 11px;
  width: 11px;
  content: "";
  top: 5px;
}
/**/
/*——————————————
Responsive Stuff
———————————————*/

@media (max-width: 945px) {
  .timeline .event::before {
    left: 0.5px;
    top: 20px;
    min-width: 0;
    font-size: 13px;
  }
  /*.timeline h4 {
    font-size: 16px;
  }*/
  .timeline p {
    padding-top: 20px;
  }
  /*section.lab h4.card-title {
    padding: 5px;
    font-size: 16px
  }*/
}

@media (max-width: 768px) {
  .timeline .event::before {
    left: 0.5px;
    top: 20px;
    min-width: 0;
    font-size: 13px;
  }
  .timeline .event:nth-child(1)::before,
  .timeline .event:nth-child(3)::before,
  .timeline .event:nth-child(5)::before {
    top: 38px;
  }
  .timeline h4 {
    font-size: 16px;
  }
  .timeline p {
    padding-top: 20px;
  }
}
/*——————————————
others
———————————————*/

a.portfolio-link {
  margin: 0 auto;
  display: block;
  text-align: center;
}
  </style>


<body class="">
  <div class="wrapper ">
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
                        <li class="nav-item" style="margin-left:15%;">
                          <a class="nav-link active" href="#profile" data-toggle="tab">
                            <i class="material-icons">person</i> Personal Information
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item" style="margin-left:10%;">
                          <a class="nav-link" href="#messages" data-toggle="tab">
                            <i class="material-icons">code</i> Projects and Experience
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item" style="margin-left:10%;">
                          <a class="nav-link" href="#settings" data-toggle="tab">
                            <i class="material-icons">equalizer</i>Perfomance
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                         
                      </ul>
                    </div>
                  </div>
                </div>
       <div class="card-body">
             <div class="tab-content">
               <div class="tab-pane active" id="profile"><br>
         <div class="col-md-10" style="align-items: center;margin-left:7%;">
           <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <i class="material-icons" style="width:100px;height:100px;font-size: 90px;">person</i>
                  </a>
                </div>
                <div class="card-body">
                  <!-- <h6 class="card-category text-gray"></h6> -->
                  <h3 class="card-title">Khushboo Chandnani</h3>
                  <h5 class="card-category text-gray">Age : 21</h5>
                   <!-- <h5 class="card-category text-gray">Contact : 9511738058</h5> -->
                    <!-- <h5 class="card-category text-gray">khushboochandnani21@gmail.com</h5> -->
                  <br>

                 <div class="card">
                <div class="card-body">
                    <div class="card-header card-header-primary">

                  <h4 class="card-title">Personal Details</h4>
                  <!-- <p class="card-category">Read the below guidelines properly.</p> -->
                </div><br>
                 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <h5><b>Email ID : </b>Khushboo Chandnani</h5>
                        </div>
                      </div>
                      <div class="col-md-6">
                       <div class="form-group">
                          <h5><b>Contact No : </b>9511738058</h5>
                        </div>
                      </div>

                    </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <h5><b>Github Link : </b>github.com/khushboochandnani</h5>
                        </div>
                      </div>
                      <div class="col-md-6">
                       <div class="form-group">
                          <h5><b>LinkedIn Link : </b> linkedin.com/in/khushboo-chandnani</h5>
                        </div>
                      </div>
                    </div>
                      <div class="row">
                      <!-- <div class="col-md-12"> -->
                        <!-- <div class="form-group"> -->
                        <!-- <h4><b><i>Based on your skillset, Languages you have to attempt are : </i> </b></h4> -->
                    <span style="font-size:19px;margin-top:10px;margin-left: 12%;"><b>Skills :  </b> </span><span style="margin-left:20px;"><button class="btn btn-warning">C</button></span> <span><button class="btn btn-info" style="margin-left:10px;">JAVA</button></span> <span><button class="btn btn-success" style="margin-left:10px;">PYTHON</button></span><span><button class="btn btn-primary" style="margin-left:10px;">UI/UX</button></span><span><button class="btn btn-warning" style="margin-left:10px;">C++</button></span><span><button class="btn btn-success" style="margin-left:10px;">RUBY</button></span>
                        </div>
                      
                      <!-- <div class="col-md-6">
                       <div class="form-group">
                          <h5>Email ID : Khushboo Chandnani</h5>
                        </div>
                      </div> -->
                    </div>
                   
              </div>
        </div>
      </div>
    <div class="card">
        <div class="card-body">
            <div class="card-header card-header-primary">

          <h4 class="card-title" style="text-align: center;">Academic Details</h4>
          <!-- <p class="card-category">Read the below guidelines properly.</p> -->
        </div>
        <section id="timeline" class="timeline-outer">
                        <div class="container" id="content">
                          <div class="row" style="margin-top:-60px;margin-left:30px;">
                            <div class="col s12 m12 l12">
                              <!-- <h3 class="blue-text lighten-1 header">Responsive Material Design Timeline</h3> -->
                              <ul class="timeline">
                                <li class="event" data-date="2014">
                                 <b><h4>School Information</h4></b>
                                  <p>
                                    Name : Sacred Heart School
                                  </p>
                                  <p>
                                    Board : State Board of Maharashtra
                                  </p>
                                  <p>
                                    Percentage : 93.88
                                  </p>
                                  
                                </li>
                                <li class="event" data-date="2016">
                                  <b><h4>Higher Secondary Information</h4></b>
                                  <p>
                                    Name : CHM College
                                  </p>
                                  <p>
                                    Board : Higher Secondary State Board of Maharashtra
                                  </p>
                                  <p>
                                    Percentage : 71.08
                                  </p>
                                  
                                </li>
                                <li class="event" data-date="Ongoing">
                                  <b><h4>College Information</h4></b>
                                  <p>
                                    Name : Vivekandnand Education Society's Institute of Technology
                                  </p>
                                  <p>
                                    Board : University of Mumbai
                                  </p>
                                  <p>
                                    CGPI : 8.78 
                                  </p>
                                  
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      
       </section>
          
          <!-- <a href="#pablo" class="btn btn-primary btn-round">Follow</a> -->
        </div>
      </div>
    </div>
  </div>
        <div class="tab-pane" id="messages"><br>
             <div class="col-md-10" style="align-items: center;margin-left:7%;">
           <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                   <i class="material-icons" style="width:100px;height:100px;font-size: 90px;text-align: center;">person</i>
                  </a>
                </div>
              
                <div class="card-body">
                  <!-- <h6 class="card-category text-gray"></h6> -->
                  <h3 class="card-title">Khushboo Chandnani</h3>
                  <h5 class="card-category text-gray">Age : 21</h5>
                   <!-- <h5 class="card-category text-gray">Contact : 9511738058</h5> -->
                    <!-- <h5 class="card-category text-gray">khushboochandnani21@gmail.com</h5> -->
                  <br>
                </div>
              </div>
                 <div class="card">
                <!-- <div class="card-body"> -->
                    <div class="card-header card-header-primary">

                  <h4 class="card-title" style="text-align: center">Experiences</h4>
                  <!-- <p class="card-category">Read the below guidelines properly.</p> -->
                </div><br>
                     
                      <ul>
                         <b><h4 style="font-weight:bold;">Internship</h4></b>
                        <h5><li>Company Name : Zataakse Foundation</li></h5>
                        <h5><li>Project Name : Food App</li></h5>
                        <h5><li>Role : Freelancer</li></h5>
                        <h5><li>Domain : UI/UX</li></h5>
                        <h5><li>Technology Stack : HTML, CSSS3, Bootstrap, Adobe XD</li></h5>
                      </ul>
                     
                      
                      
                      
                      <!-- <div class="col-md-6">
                       <div class="form-group">
                          <h5>Email ID : Khushboo Chandnani</h5>
                        </div>
                      </div> -->
                    </div>
                    <div class="card">
                <!-- <div class="card-body"> -->
                    <div class="card-header card-header-primary">

                  <h4 class="card-title" style="text-align: center">Projects</h4>
                  <!-- <p class="card-category">Read the below guidelines properly.</p> -->
                </div><br>
                     
                      <ul>
                         <b><h4 style="font-weight:bold;">Project1</h4></b>
                        <h5><li>Project Name : Vesitchain</li></h5>
                        <h5><li>Contribution : UI Developer</li></h5>
                        <h5><li>Domain : Blockchain</li></h5>
                        <h5><li>Duration : 4 months (BE Project)</li></h5>
                        <h5><li>Technology Stack : HTML, CSS3, Eherium, Truffle, Ajax</li></h5>
                      </ul>
                     
                      
                      
                      
                      <!-- <div class="col-md-6">
                       <div class="form-group">
                          <h5>Email ID : Khushboo Chandnani</h5>
                        </div>
                      </div> -->
                    </div>
                   
              </div>
        
      </div>
          
          </div>
         

        
         
        </div>

                  
              
            </div>
          </div>

         </div>
                  
              
                  
                  
                   
            
                <!-- <a  href="#">Add Email Field</a> -->
                    
                  
                </div>
              </div>
            
                      <!-- <button id="addinternship" type="submit" class="btn btn-info">Add more</button> -->
                    <!-- <button type="submit" class="btn btn-primary pull-right">Submit Profile</button> -->
                    <div class="clearfix"></div>
                  </div>

                  
                     
                    <!-- <button type="submit" class="btn btn-primary pull-right">Submit Profile</button> -->
                    <div class="clearfix"></div>
                  
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
     
    </div>
  </div>
@include('includes/footer')

</body>

</html>
