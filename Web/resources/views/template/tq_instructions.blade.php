
@include('includes/header')
@include('includes/sidebar')

<div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Dashboard</a>
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
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                 
                 <p id="iq_test_score"> Technical Test</p>
                  <h3 class="card-title">Technical  Test Instructions !!</h3>
                  <p class="card-category">Read the below guidelines properly.</p>
                </div>
                <div class="card-body">
                  <ul>
                    <br>
                    <li><h4>Total number of sections : 4 (Intelligent + Emotional + Technical + Adversity)</h4></li>
                    <li><h4>Total number of questions : 90 + Technical Section</h4></li>
                    <li><h4>Number of questions in each section : 30.</h4></li>
                    <li><h4>Time alloted for each section : 30 minutes.</h4></li>
                    <li><h4>Total Time to complete the test : 1 hr 20 minutes.</h4></li>
                    <li><h4>Each question carry 1 mark, no negative marks.</h4></li>
                    <li><h4>DO NOT Referesh the page.</h4></li>
                    <li><h4>DO NOT Switch between sections.</h4></li>
                    <li><h4>DO NOT Switch tabs.</h4></li><br>
                    
                    <h4><b><i>Based on your skillset, Languages you have to attempt are : </i> </b></h4>
                    
                    <?php
                      $a=array("btn btn-warning","btn btn-info","btn btn-success","btn btn-warning","btn btn-info","btn btn-success","btn btn-warning","btn btn-info","btn btn-success");
                      $count=0;
                      
//                      $skill_set=array("c","c","c","c","c");
                      ?>
                    @foreach($skill_set as $skills)
                    <?php
                          if($skills=="C"){
                              $c=1 ;
                          }else if($skills=="Python"){
                              $c=30;
                          }else{
                              $c=60;
                          }
                          ?>
                    <span><a href="/tech_test/{{$skills}}/{{$c+1}}"><button class="<?php echo $a[$count]?>" style="margin-left:20px;">{{$skills}}</button></a></span> 
                    <?php
                    $count+=1;
    ?>
<!--                    <span><button class="btn btn-info" style="margin-left:10px;">JAVA</button></span> <span><button class="btn btn-success" style="margin-left:10px;">PYTHON</button></span>-->
                    
                    
                    
                    @endforeach
                   <!--  <li><h4>Number of questions in each section : 30.</h4></li>
                    <li><h4>Number of questions in each section : 30.</h4></li> -->
                  </ul>
                  
                  <!-- <h4></h4> --><br>
           
                  
                  
                  <h4 style="margin-left:40px;"><b><i>All the best :-).</i></b></h4>
<!--
                  <a href="/eq">
                  <button style="margin-left:30px;" type="submit" class="btn btn-primary">Start Your Emotional Quotient Test Now!!</button>
                  </a>
-->
                 <p>



</p>
        
                </div>

              </div>
            </div>
           
          </div>
        </div>

      </div>

      @include('includes/footer')

     <script>
//      var iq_score_var = localStorage.getItem('iq_score'); 
//            alert(iq_score_var);
//       document.getElementById("iq_test_score").innerHTML="IQ test score "+iq_score_var;     

  // var iq_score=localStorage.getItem('iq_score');
    // document.getElementById.innerHTML=iq_score; 
    </script>
     
      <script type="text/javascript">
      	      localStorage.setItem('tq_score',0);

      </script>
