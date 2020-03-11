  
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
@include('includes/company_header')
@include('includes/company_sidebar')

<div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Company Login</a>
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
          <div class="col-md-5">
                                  <div class="form-group">
                                    <!-- <div class="form-group"> -->
                                    <!-- <label for="sel1">Gender</label> -->

                                    <select name="skills[]" id="skill_select" multiple="multiple" class="form-control" name="skills">
                                      <option value="C">C</option>
                                      <option value="Java">Java</option>
                                      <option value="C++">C++</option>
                                      <option value="Python">Python</option>
                                      <option value="Sql">Oracle</option>
                                      <option value="Sql">MongoDB</option>
                                         <option value="Sql">DBMS</option>
                                         
                                            <option value="Sql">HTML</option>
                                             <option value="Sql">Laravel</option>
                                              <option value="Sql">Bootstrap</option>
                                               <option value="Sql">CSS</option>
                                                <option value="Sql">Javascript</option>
                                                 <option value="Sql">Node</option>
                                                  <option value="Sql">Code Igniter</option>

                                    </select>
                                    <!-- </div> -->
                                  </div>

                    </div>
                     <div class="col-md-5">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">Filter Based on Location</label>
                                    <input type="text" class="form-control" name="location">
                                  </div>
                                  
                    </div>
                    <div class="col-md-2">
                                  <div class="form-group">
                                    <button class="btn btn-primary" style="margin-top: -10px;">Filter</button>
                                  </div>
                                  
                    </div>
                  </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h2 class="card-title">LinkedIn Jobs</h2>
                  <p class="card-category">Find LinkedIn Profiles Here</p>
                </div>
                <div class="card-body">
                <section class="site-section">
      <div class="container jobs">

       
        
        
        <div class="mb-5">
        @foreach($linkedin as $linkedin)  

          <div class="row align-items-start job-item border-bottom pb-3 mb-3 pt-3">
            <div class="col-md-2">
              <h2><a href="job-single.html">{{ $linkedin->user_name }}</a> </h2>
               <p class="meta"> {{ $linkedin->connections }} Connections </p>
            </div>
            <div class="col-md-2" style="margin-top:-20px;">
              <h3>{{ $linkedin->location }}</h3>
              <!-- <span class="meta">Australia</span> -->
            </div>
            <div class="col-md-5">
              <span class="badge badge-warning px-2 py-1 mb-3">{{ $linkedin->skills }}</span>
               
            </div>
            <div class="col-md-2">
                <h4><a href="https://www.linkedin.com/in/mehul-giri-3b2b5815/">{{ $linkedin->link }}</a></h4>
            </div>
          </div>
          @endforeach
          <div class="row align-items-start job-item border-bottom pb-3 mb-3 pt-3">
            <div class="col-md-2">
              <h2><a href="job-single.html">Mehul Giri</a> </h2>
               <p class="meta"><strong>500+</strong> Connections </p>
            </div>
            <div class="col-md-2" style="margin-top:-20px;">
              <h3>Mumbai</h3>
              <!-- <span class="meta">Australia</span> -->
            </div>
            <div class="col-md-5">
              <span class="badge badge-primary px-2 py-1 mb-3">Business Intelligence</span>
               <span class="badge badge-warning px-2 py-1 mb-3">Automation</span>
                <span class="badge badge-success px-2 py-1 mb-3">Lean Six Sigma</span>
                 <span class="badge badge-danger px-2 py-1 mb-3">Strategic Planning</span>
            </div>
            <div class="col-md-2">
                <h4><a href="https://www.linkedin.com/in/mehul-giri-3b2b5815/">https://www.linkedin.com/in/mehul-giri-3b2b5815/</a></h4>
            </div>
          </div>


       
           
          

        </div>
        
        

      </div>
    </section>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@include('includes/company_footer')
<script src="../../assets/select2/js/select2.min.js"></script>
 <script>

  jQuery(document).ready(function() {

    $("#skill_select").select2({
      multiple: true,
      placeholder: "Filter based on SkillSet",

    });

   


  });

</script>
